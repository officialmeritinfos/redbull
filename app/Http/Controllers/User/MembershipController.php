<?php

namespace App\Http\Controllers\User;

use App\Defaults\Regular;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\MembershipApplication;
use App\Models\User;
use App\Notifications\InvestmentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MembershipController extends Controller
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
            'pageName'=>'Membership ID',
            'siteName'=>$web->name,
            'members'=>MembershipApplication::where('user',$user->id)->paginate(),
        ];

        return view('user.membership',$dataView);
    }
    public function processApplication(Request $request)
    {
        $web = GeneralSetting::where('id',1)->first();
        $user = Auth::user();
        $validator = Validator::make($request->all(),[
            'name'=>['required','string','max:150'],
            'country'=>['required','string','max:200'],
            'state'=>['required','string','max:150'],
            'address'=>['required','string','max:2000'],
            'phone'=>['required','string','max:2000'],
            'selfie'=>['required','image','max:2048'],
        ],[],[
            'selfie' => "Passport-sized photograph"
        ]);

        if ($validator->fails()){
            return back()->with('errors',$validator->errors());
        }

        $input = $validator->validated();

        //generate deposit reference
        $reference = $this->generateId('membership_applications','reference',6);

        if ($request->hasFile('selfie')) {
            //lets upload the first image
            $frontImage = time() . '_' . $request->file('selfie')->hashName();
            $request->selfie->move(public_path('dashboard/user/images/'), $frontImage);

        }else{
            return back()->with('error','Passport Photograph is compulsory.');
        }


        $membership = MembershipApplication::create([
            'user'=>$user->id,'reference'=>$reference,
            'address'=>$input['address'],
            'status'=>2, 'name'=>$input['name'],'country'=>$input['country'],
            'state'=>$input['state'],'selfie'=>$frontImage,'phone'=>$input['phone']
        ]);
        if (!empty($membership)){
            //send mail to admin
            //check if admin exists
            $admin = User::where('is_admin',1)->first();
            $userMessage = "
                    Your new Membership ID application has been received.
                    Your Application reference Id is <b>".$reference."</b>.<br/>
                ";
            //send mail to user
            $user->notify(new InvestmentMail($user,$userMessage,'Membership ID Application'));
            //send mail to Admin
            if (!empty($admin)){
                $adminMessage = "
                    A new Membership ID application has been received from the user <b>".$user->name."</b> with
                    reference <b>".$reference."</b>
                ";
                //SendInvestmentNotification::dispatch($admin,$adminMessage,'New Investment Initiation');
                $admin->notify(new InvestmentMail($admin,$adminMessage,'New Membership ID Application'));
            }
            return redirect()->back()->with('success','Application successful. Your account manager will reach out to you soon.');
        }
        return back()->with('error','Something went wrong');
    }
}
