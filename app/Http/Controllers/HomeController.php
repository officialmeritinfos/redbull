<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\Guest;
use App\Models\Investment;
use App\Models\LatestTransaction;
use App\Models\Package;
use App\Models\ReturnType;
use App\Models\Service;
use App\Models\Withdrawal;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request  $request)
    {
        $web = GeneralSetting::where('id',1)->first();

        //check if the referral is stored
        if (!Cache::has('referral')){
            Cache::put('referral',$request->get('referral'),now()->addDays(7));
        }

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Home Page',
            'packages'  => Package::where('status',1)->get(),
            'withdrawals'=>LatestTransaction::where('type','withdrawal')->orderBy('id','desc')->limit(5)->get(),
            'deposits'=>LatestTransaction::where('type','deposit')->orderBy('id','desc')->limit(5)->get(),
            'services'  =>Service::where('status',1)->get(),
            'sectors'  =>Service::where('status',1)->where('isSector',1)->get()
        ];

        return view('home.home',$dataView);
    }

    public function about()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Company Overview',
            'packages'  => Package::where('status',1)->get(),
            'services'  =>Service::where('status',1)->get(),
            'sectors'  =>Service::where('status',1)->where('isSector',1)->get()
        ];

        return view('home.about',$dataView);
    }
    public function plans()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Packages',
            'packages'  => Package::where('status',1)->get(),
            'services'  => Service::where('status',1)->get(),
        ];

        return view('home.plans',$dataView);
    }
    public function terms()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Terms and Conditions',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.terms',$dataView);
    }
    public function privacy()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Privacy Policy',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.privacy',$dataView);
    }
    public function faqs()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Frequently Asked Questions',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.faq',$dataView);
    }
    public function services()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Services',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.service',$dataView);
    }
    public function estate()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Real Estates',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.estates',$dataView);
    }
    public function contact()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Contact us',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.contact',$dataView);
    }
    public function buyBtc()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Where to Buy Bitcoin',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.buy_btc',$dataView);
    }
    //service detail
    public function serviceDetail($id)
    {
        $web = GeneralSetting::where('id',1)->first();

        $service = Service::where('id',$id)->firstOrFail();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => $service->title,
            'service'  => $service
        ];

        return view('home.service_detail',$dataView);
    }
    //security
    public function security()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Security Information',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.security',$dataView);
    }

    public function realEstate()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Real Estate',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.estates',$dataView);
    }
    public function nft()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'NFT',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.nft',$dataView);
    }
    public function gold()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Gold',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.gold',$dataView);
    }
    public function retirement()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Retirement and IRAs',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.retirement',$dataView);
    }
    public function forex()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Foreign Exchange',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.forex',$dataView);
    }
    public function stocks()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Stocks & ETFs',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.stocks',$dataView);
    }
    public function agriculture()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Agriculture',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.agriculture',$dataView);
    }
    public function career()
    {
        $web = GeneralSetting::where('id',1)->first();

        $dataView = [
            'siteName'  => $web->name,
            'web'       => $web,
            'pageName'  => 'Career',
            'packages'  => Package::where('status',1)->get()
        ];

        return view('home.career',$dataView);
    }
    //calculate possible return
    public function calculateReturn(Request  $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $validator = Validator::make($request->input(),[
            'amount'=>['required','numeric'],
            'email'=>['required','email'],
            'package'=>['required','exists:packages,id']
        ]);
        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }
        $input = $validator->validated();

        $packageExists = Package::where('id',$input['package'])->first();

        //check if amount matches
        if ($packageExists->isUnlimited !=1){
            if ($packageExists->maxAmount < $input['amount']){
                return back()->with('error','Amount cannot be greater than maximum amount');
            }
        }
        if ($packageExists->minAmount > $input['amount']){
            return back()->with('error','Amount cannot be less than minimum amount');
        }

        //get the return type attached to investment package
        $returnType = ReturnType::where('id',$packageExists->returnType)->first();
        //do calculations for the investment
        $roi = $packageExists->roi;
        $profitPerReturn = $input['amount']*($roi/100);

        $totalProfit = $profitPerReturn*$packageExists->numberOfReturns;

        $guest = Guest::firstOrCreate([
            'email'=>$input['email']
        ]);

        $message = "Here is your calculation request: if you Invest <b>$".$input['amount']."</b> in the Package <b>".$packageExists->name."</b>;
        you will earn <b>$".$profitPerReturn."</b> ".$returnType->name.". For the period of ".$packageExists->Duration.", you will earn a
        total of <b>$".$totalProfit."</b>.
        <br/>";

        $guest->notify(new InvestmentMail($guest,$message,'Calculated Return on '.$web->name));

        return back()->with('success','Calculation sent to your mail');

    }
}

