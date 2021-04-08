<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Chief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChiefRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:chief');
    }

    public function showRegisterForm()
    {
        return view('auth.chief-register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:chiefs'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $request['password'] = Hash::make($request->password);
        Chief::create($request->all());

        return redirect()->intended(route('chief.dashboard'));
    }
}
