<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Models\Mail;
use App\Models\Promo;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Mails extends Controller
{
    //landing page
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Send email',
            'user'     =>  $user,
            'mails'=>Mail::paginate()
        ];

        return view('admin.mail',$dataView);
    }
    public function create()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'New Mail',
            'user'     =>  $user,
            'web'=>$web,
            'investors'=>User::where('status',1)->get()
        ];

        return view('admin.mail_new',$dataView);
    }
    public function newPromo(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->input(),[
            'title'=>['required','string'],
            'content'=>['required','string'],
            'investors'=>['required'],
            'investors.*'=>['required','exists:users,id']
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }
        $input = $validator->validated();


        $data = [
            'title'=>$input['title'],
            'content'=>$input['content']
        ];

        Mail::create($data);

        foreach ($input['investors'] as $investor) {
            $invest = User::where('id',$investor)->first();
            $invest->notify(new InvestmentMail($invest, $input['content'], $input['title']));
        }

        return back()->with('success','Mail Sent');
    }
}
