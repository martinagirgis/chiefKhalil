<?php

namespace App\Http\Controllers\Auth;

use App\Chief;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\SendSBTorecipientChief;

class ChiefForgetPasswordController extends Controller
{
    public function showForm()
    {
        return view('auth.passwords.chief-email');

    }

    public function sendPasswordResetToken(Request $request)
    {
        $user = Chief::where('email', $request->email)->first();
        if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);

        //create a new token to be sent to the user. 
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(36), 
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')
        ->where('email', $request->email)->first();

        $token = $tokenData->token;
        $email = $request->email; 

        Mail::to($request->email)->send(new SendSBTorecipientChief($token));

        return redirect('chief/login')->with('success','chick your email');

    /**
        * Send email to the email above with a link to your password reset
        * something like url('password-reset/' . $token)
        * Sending email varies according to your Laravel version. Very easy to implement
        */

        // $data = array('name'=>"Virat Gandhi");
        // $tok = array('url'=>'<a href="https://localhost:8080/password-reset/'. $token .'">reset password</a>');
        // Mail::send($tok,["data1"=>$data], function($message) {
            
        //    $message->to('michealadel1212@gmail.com', 'Tutorials Point')
        //    ->subject('reset password')->setBody('<a href="https://localhost:8080/password-reset/'. $data1["name"] .'">reset password</a>', 'text/html');
        //    $message->from('martinasaid2018@gmail.com','Virat Gandhi');
        // });
        //echo "HTML Email Sent. Check your inbox.";
    }

    public function showPasswordResetForm($token)
    {
        $token=$token;
        $tokenData = DB::table('password_resets')
        ->where('token', $token)->first();
        
        //print_r($tokenData);
        if ( !$tokenData ) return redirect()->to('home');
        return view('auth.passwords.chief-reset',compact('token'));
    }

    public function resetPassword(Request $request, $token)
    {
        //some validation
   
        $password = $request->password;
        $tokenData = DB::table('password_resets')
        ->where('token', $token)->first();
   
        $user = Chief::where('email', $tokenData->email)->first();
        if ( !$user ) return redirect()->to('home');
   
        $user->password = Hash::make($password);
        $user->update(); 
   
        DB::table('password_resets')->where('email', $user->email)->delete();
    
        return redirect('chief/login')->with('success','event successfully updated');
    }
}
