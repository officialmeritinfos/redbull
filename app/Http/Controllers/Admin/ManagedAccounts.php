<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\ManageAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagedAccounts extends Controller
{
    //landing page
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'deposits'=>ManageAccount::get(),
            'pageName'=>'Managed Accounts',
            'siteName'=>$web->name
        ];

        return view('admin.managed_accounts',$dataView);
    }

    public function markOngoing($id)
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $account = ManageAccount::where('id',$id)->update([
            'status'=>4
        ]);

        return back()->with('success','Account activated');
    }
    public function markCompleted($id)
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $account = ManageAccount::where('id',$id)->update([
            'status'=>1
        ]);

        return back()->with('success','Account Completed');
    }
    public function cancel($id)
    {

    }
}
