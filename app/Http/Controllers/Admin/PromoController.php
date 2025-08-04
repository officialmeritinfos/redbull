<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PromoController extends Controller
{
    //landing page
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Admin Dashboard',
            'user'     =>  $user,
            'promos'=>Promo::get()
        ];

        return view('admin.promos',$dataView);
    }
    public function edit($id)
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $Promo = Promo::where('id',$id)->first();
        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Edit Promo',
            'user'     =>  $user,
            'web'=>$web,
            'promo'=>$Promo,
        ];

        return view('admin.promo_details',$dataView);
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
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }
        $input = $validator->validated();


        $data = [
            'title'=>$input['title'],'content'=>$input['content'],
            'status'=>$input['status'],
        ];

        Promo::where('id',$input['id'])->update($data);

        return back()->with('success','Promo Updated');
    }

    public function delete($id)
    {
        Promo::where('id',$id)->delete();
        return back()->with('success','Deleted');
    }
    public function create()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'New Promos',
            'user'     =>  $user,
            'web'=>$web,
        ];

        return view('admin.new_promo',$dataView);
    }
    public function newPromo(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->input(),[
            'title'=>['required','string'],
            'content'=>['required','string'],
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
        ];

        Promo::create($data);

        return back()->with('success','Promo added');
    }
}
