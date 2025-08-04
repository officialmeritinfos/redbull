<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\Investment;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView =[
            'siteName' => $web->name,
            'pageName' => 'Admin Dashboard',
            'user'     =>  $user,
            'deposits'  => Deposit::where('status',1)->sum('amount'),
            'pendingDeposit'=>Deposit::where('status','!=',1)->sum('amount'),
            'withdrawals'=>Withdrawal::where('status',1)->sum('amount'),
            'pendingWithdrawal'=>Withdrawal::where('status','!=',1)->sum('amount'),
            'investments' => Investment::sum('amount'),
            'ongoingInvestments'=>Investment::where('status',4)->sum('amount'),
            'completedInvestments'=>Investment::where('status',1)->sum('amount'),
            'cancelledInvestments'=>Investment::where('status',3)->sum('amount'),
            'investors'=>User::where('id','!=', $user->id)->get()
        ];

        return view('admin.dashboard',$dataView);
    }
}
