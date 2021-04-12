<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\SendCode;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);
        if($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutResponse($request);
        }
         //-------------------

        if($this->guard()->validate($this->credentials($request))){
            $user=$this->guard()->getLastAttempted();
            if($user->active && $this->attemptLogin($request) && $user->package_id != null && $user->endDateSubscripe >= date('Y-m-d')){
                return $this->sendLoginResponse($request);
            }

            elseif($user->package_id == null || $user->endDateSubscripe < date('Y-m-d'))
            {
                session()->put('userId', $user->email);
                return redirect('/package');
            }

            else{
                $this->incrementLoginAttempts($request);
                $user->code=SendCode::sendCode($user->countryCode,$user->phone);
                if($user->save()){
                    return redirect('/verify?phone='.$user->phone);
                }
            }
        }
        //-----------
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
}
