<?php

namespace App\Http\Controllers\User;

use App\Defaults\Regular;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\LoanApplication;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    use Regular;

    public function landingPage()
    {
        $web = GeneralSetting::find(1);
        $user = Auth::user();

        $dataView = [
            'web'=>$web,
            'user'=>$user,
            'pageName'=>'Loan Lists',
            'siteName'=>$web->name,
            'loans'=>LoanApplication::where('user',$user->id)->paginate(),
        ];

        return view('user.loans',$dataView);
    }

    public function processApplication(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->input(),[
            'amount'=>['required','string','max:100'],
            'loanType'=>['required','string','max:100'],
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }

        $input = $validator->validated();

        //generate deposit reference
        $reference = $this->generateId('loan_applications','reference',15);


        $loan = LoanApplication::create([
            'user'=>$user->id,'reference'=>$reference,
            'loanType'=>$input['loanType'],
            'amount'=>$input['amount'],
            'status'=>2,
        ]);
        if (!empty($loan)){
            //send mail to admin
            //check if admin exists
            $admin = User::where('is_admin',1)->first();
            $userMessage = "
                    Your new loan application has been received.
                    Your Application reference Id is <b>".$reference."</b>.
                ";
            //send mail to user
            $user->notify(new InvestmentMail($user,$userMessage,'Loan Application'));
            //send mail to Admin
            if (!empty($admin)){
                $adminMessage = "
                    A new loan application has been received from the user <b>".$user->name."</b> with
                    reference <b>".$reference."</b>
                ";
                //SendInvestmentNotification::dispatch($admin,$adminMessage,'New Investment Initiation');
                $admin->notify(new InvestmentMail($admin,$adminMessage,'New Loan Application'));
            }
            return redirect()->back()->with('success','Application successful. A support agent will be in touch soon.');
        }
        return back()->with('error','Something went wrong');
    }
}
