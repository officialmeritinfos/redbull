<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $web = \App\Models\GeneralSetting::where('id', 1)->first();

        return view('home.home', [
            'siteName' => $web->name,
            'web'      => $web,
            'pageName' => 'Home Page',
        ]);
    }

    public function apply(Request $request)
    {
        // 1) Validate (accept both hyphen and en dash in driving_hours)
        $data = $request->validate([
            'first_name'     => ['required','string','max:80'],
            'last_name'      => ['required','string','max:80'],
            'email'          => ['required','email','max:120'],
            'phone'          => ['required','string','max:30'],
            'city'           => ['required','string','max:120'],
            'street_address' => ['required','string','max:160'],
            'state'          => ['required','string','max:2'],
            'zip_code'       => ['required','string','max:10'],
            'car_model'      => ['required','string','max:160'],
            'driving_hours'  => ['required','string','max:3'], // we'll normalize below
            'bank_name'      => ['required','string','max:160'],
        ]);

        // Normalize driving_hours to ASCII hyphen (handles “1–2”, “3–4”, etc.)
        $data['driving_hours'] = str_replace(['–','—'], '-', $data['driving_hours']);

        // 2) Telegram config
        $token  = config('app.telegram.token');
        $chatId = config('app.telegram.chat_id');
        if (blank($token) || blank($chatId)) {
            \Log::error('Telegram config missing: token or chat_id not set.');
            return back()->withErrors(['form' => 'Configuration error. Please try again later.'])->withInput();
        }

        // 3) MarkdownV2 escape helper
        $escape = function (string $v): string {
            // Escape everything Telegram cares about in MarkdownV2
            $map = [
                '_' => '\_', '*' => '\*', '[' => '\[', ']' => '\]',
                '(' => '\(', ')' => '\)', '~' => '\~', '`' => '\`',
                '>' => '\>', '#' => '\#', '+' => '\+', '-' => '\-',
                '=' => '\=', '|' => '\|', '{' => '\{', '}' => '\}',
                '.' => '\.', '!' => '\!', ':' => '\:',
            ];
            return strtr($v, $map);
        };

        // 4) Build the message (escape ALL dynamic values, including the date)
        $lines = [
            "🚗 *New Car Advertising Application*",
            "",
            "*Name:* "           . $escape($data['first_name'].' '.$data['last_name']),
            "*Email:* "          . $escape($data['email']),
            "*Phone:* "          . $escape($data['phone']),
            "*City:* "           . $escape($data['city']),
            "*Street:* "         . $escape($data['street_address']),
            "*State:* "          . $escape(strtoupper($data['state'])),
            "*ZIP:* "            . $escape($data['zip_code']),
            "*Car:* "            . $escape($data['car_model']),
            "*Driving hours:* "  . $escape($data['driving_hours']),
            "*Bank name:* "      . $escape($data['bank_name']),
            "",
            "Submitted: " . $escape(now()->format('Y-m-d H:i:s')),
        ];
        $text = implode("\n", $lines);

        try {
            $response = \Http::asForm()->post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id'                  => $chatId,
                'text'                     => $text,
                'parse_mode'               => 'MarkdownV2',
                'disable_web_page_preview' => true,
            ]);

            if (!$response->ok() || !data_get($response->json(), 'ok')) {
                \Log::error('Telegram sendMessage failed', [
                    'status' => $response->status(),
                    'body'   => $response->body(),
                ]);
                return back()->withErrors(['form' => 'Could not submit at the moment. Please try again.'])->withInput();
            }

            return back()->with('status', 'Thanks! Your application was received. We’ll contact you within 24 hours.');
        } catch (\Throwable $e) {
            \Log::error('Telegram sendMessage exception', ['error' => $e->getMessage()]);
            return back()->withErrors(['form' => 'Unexpected error. Please try again.'])->withInput();
        }
    }
}
