<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\LatestTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LatestTransactionController extends Controller
{
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Supported Coins',
            'user'     =>  $user,
            'web'=>$web,
            'transactions'=>LatestTransaction::get()
        ];

        return view('admin.latest_transactions',$dataView);
    }


    public function delete($id)
    {
        LatestTransaction::where('id',$id)->delete();
        return back()->with('success','Deleted');
    }

    public function newTransaction(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->input(),[
            'name'=>['required','string'],
            'type'=>['required','string','in:deposit,withdrawal'],
            'amount'=>['nullable','string'],
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }
        $input = $validator->validated();


        LatestTransaction::create([
            'name' => $input['name'],
            'type' => $input['type'],
            'amount' => $input['amount'],
        ]);

        return back()->with('success','Transaction added');
    }
}
