<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\models\UserPackages;

class VerifyController extends Controller
{
    public function getVerify(){
        return view('auth.verify');
    }
    public function postVerify(Request $request){
        if($user=User::where('code',$request->code)->first()){
            $user->active=1;
            $user->code=' ';
            $user->save();
            return redirect()->route('getPackages')->withMessage('Your account is active');
        }
        else{
            return back()->withMessage('verify code is not correct. Please try again');
        } 
    }

    public function getPackages()
    {
        $packages = UserPackages::get();
        return view('auth.package',compact('packages'));
    }

    public function getPaymentt($id)
    {
        session()->put('packageId', $id);
        $package = UserPackages::find($id);
        return view('auth.payment',compact('package'));
    }

    public function addPackage()
    {
        $userEmail = session()->get('userId');
        $packageId = session()->get('packageId');
        $package = UserPackages::find($packageId);
        $NewDate=Date('y:m:d', strtotime('+' . $package->duration . ' days'));

        $currentUser = User::where('email',$userEmail);
        $user = $currentUser->update([
            'package_id'  => $packageId,
            'endDateSubscripe' => $NewDate,
        ]);
        if($user){
            return redirect('login')->with('success','payment successfully please login');
        }
        else
        {
            return back()->withMessage('verify code is not correct. Please try again');
        }
    }

}
