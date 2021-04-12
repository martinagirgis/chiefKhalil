<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\SendCode;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
//<<<<<<< HEAD
    protected $redirectTo = RouteServiceProvider::HOME;
/*=======
    protected $redirectTo  = '/verify';
>>>>>>> 309408b707ad2bee25612f1b5b3442e0f187296*/

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        // return $this->registered($request,$user) ?: redirect('/');
        return $this->registered($request,$user) ?: redirect('/verify?phone=' . $request->phone);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            // 'fname' => ['required', 'string', 'max:255'],
            // 'lname' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $imageName = time().'.'.$data['image']->extension();
        $data['image']->move(public_path('assets/site/backImages/users'), $imageName);
        $allphone = $data['countryCode'] . $data['phone'];
        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone'=>$data['phone'],
            'active'=>0,
            'gender' => $data['gender'],
            'state' => 1,
            'image' => $imageName,
            'countryCode' => $data['countryCode'],
            'code'=>SendCode::sendCode($data['countryCode'],$data['phone']),
        ]);
        //if($user){
          //  $user->code=SendCode::sendCode($user->phone);
            $user->save();
        //}
        session()->put('userId', $data['email']);
    }
}
