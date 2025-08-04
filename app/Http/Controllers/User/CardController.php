<?php

namespace App\Http\Controllers\User;

use App\Defaults\Regular;
use App\Http\Controllers\Controller;
use App\Models\CardApplication;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CardController extends Controller
{
    use Regular;
    //landing page
    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'pageName'=>'Cards',
            'siteName'=>$web->name,
            'cards'=>CardApplication::where('user',$user->id)->paginate(),
        ];

        return view('user.cards',$dataView);

    }
    public function processApplication(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->input(),[
            'name'=>['required','string','max:150'],
            'address'=>['required','string','max:150'],
            'country'=>['required','string','max:150'],
            'phone'=>['required','string','max:150'],
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }

        $input = $validator->validated();

        //generate deposit reference
        $reference = $this->generateId('card_applications','reference',15);


        $card = CardApplication::create([
            'user'=>$user->id,'reference'=>$reference,
            'address'=>$input['address'],'cardType'=>$input['cardType'],
            'status'=>2, 'name'=>$input['name']
        ]);
        if (!empty($card)){
            //send mail to admin
            //check if admin exists
            $admin = User::where('is_admin',1)->first();
            $userMessage = "
                    Your new card application has been received.
                    Your Application reference Id is <b>".$reference."</b>.<br/>
                    Please contact support for payment.
                ";
            //send mail to user
            $user->notify(new InvestmentMail($user,$userMessage,'Card Application'));
            //send mail to Admin
            if (!empty($admin)){
                $adminMessage = "
                    A new card application received from the user <b>".$user->name."</b> with
                    reference <b>".$reference."</b>
                ";
                //SendInvestmentNotification::dispatch($admin,$adminMessage,'New Investment Initiation');
                $admin->notify(new InvestmentMail($admin,$adminMessage,'New Card Application'));
            }
            return redirect()->back()->with('success','Application successful. Please contact support on livechat for payment.');
        }
        return back()->with('error','Something went wrong');
    }
}
