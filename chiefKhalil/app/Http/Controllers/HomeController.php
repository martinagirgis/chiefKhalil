<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\UserPackages;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $package = UserPackages::find(Auth::guard('web')->user()->package_id);
        return view('site.profile',compact('package'));
    }

    public function edit()
    {
        $user = User::find(Auth::guard('web')->id());
        return view('site.updateProfileInfo',compact('user'));
    }

    public function update(Request $request)
    {
        
        $currentUser = User::find(Auth::guard('web')->id());

        if ($request->img) {
            unlink(public_path('assets/site/backImages/users') .'/' . $currentUser->image);
            
            $coverName = time() . '.' . $request->img->getClientOriginalExtension();
            $request->img->move(public_path('/assets/site/backImages/users'), $coverName);
        }
        else{
            $coverName = $currentUser->image;
        }

        $user = $currentUser->update([
            'fname'  => $request->fname,
            'lname'  => $request->lname,
            'email'  => $request->email,
            'gender'  => $request->gender,
            'image' => $coverName,
        ]);

        if($user){
            return redirect('/')->withStatus('admin successfully updated');
        }
        else
        {
            return redirect('/')->withStatus('no admin have this id');
        }
    }

    public function editAccount()
    {
        $user = User::find(Auth::guard('web')->id());
        return view('site.updateProfileAccount',compact('user'));
    }

    public function updateAccount(Request $request)
    {
        $rules = [
            'Current_Password' => 'required',
            'Password' => ['required', 'same:Password', 'min:8'],
            'password_confirmation' => 'required|same:Password',
        ];
        $this->validate($request,$rules);
        
        if(Auth::Check())
    {
        $requestData = $request->All();
        // $validator = $this->validatePasswords($requestData);

            $currentPassword = Auth::User('web')->password;
            if(Hash::check($requestData['Current_Password'], $currentPassword))
            {
                $userId = Auth::User('web')->id;
                $currentVendor = User::find($userId);
                $currentVendor->update([
                    'password'  => Hash::make($requestData['Password']),
                ]);
                return redirect()->back()->with('success', 'success');
            }
            else
            {
                return redirect()->back()->with('success', 'Sorry, your current password was not recognised. Please try again.!');
                //return back()->withErrors(['Sorry, your current password was not recognised. Please try again.']);
            }
        // }
    }
    else
    {
        // Auth check failed - redirect to domain root
        return redirect()->to('/');
    }
    }
}
