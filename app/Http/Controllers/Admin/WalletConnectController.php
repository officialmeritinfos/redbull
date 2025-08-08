<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\UserWalletConnection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletConnectController extends Controller
{
    public function landingPage(Request $request)
    {
        $wallets = UserWalletConnection::with('user')
            ->latest()
            ->paginate(20);

        $web  = GeneralSetting::find(1);
        $user = Auth::user();

        return view('admin.wallet', [
            'siteName' => $web->name ?? config('app.name'),
            'pageName' => 'Wallet Connections',
            'user'     => $user,
            'web'      => $web,
            'wallets'  => $wallets,
        ]);
    }

}
