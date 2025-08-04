<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Notification;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Notifications extends Controller
{
    //landing page
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Notifications',
            'user'     =>  $user,
            'promos'=>Notification::get()
        ];

        return view('admin.notifications',$dataView);
    }
    public function edit($id)
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $Promo = Notification::where('id',$id)->first();
        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Edit Notifications',
            'user'     =>  $user,
            'web'=>$web,
            'promo'=>$Promo,
            'users'=>User::get()
        ];

        return view('admin.notification_details',$dataView);
    }

    public function updatePromo(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->input(),[
            'id'=>['required','numeric'],
            'title'=>['required','string'],
            'content'=>['required','string'],
            'status'=>['required','numeric'],
            'user'=>['required','numeric','exists:users,id'],
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }
        $input = $validator->validated();


        $data = [
            'title'=>$input['title'],'content'=>$input['content'],
            'status'=>$input['status'],'user'=>$input['user']
        ];

        Notification::where('id',$input['id'])->update($data);

        return back()->with('success','Notification Updated');
    }

    public function delete($id)
    {
        Notification::where('id',$id)->delete();
        return back()->with('success','Deleted');
    }
    public function create()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'New Notification',
            'user'     =>  $user,
            'web'=>$web,
            'users'=>User::get()
        ];

        return view('admin.new_notification',$dataView);
    }
    public function newPromo(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->input(),[
            'title'=>['required','string'],
            'content'=>['required','string'],
            'user'=>['required','numeric','exists:users,id'],
            'status'=>['required','numeric'],
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }
        $input = $validator->validated();


        $data = [
            'title'=>$input['title'],
            'content'=>$input['content'],
            'status'=>$input['status'],
            'user'=>$input['user']
        ];

        Notification::create($data);

        return back()->with('success','Notification added');
    }
}
