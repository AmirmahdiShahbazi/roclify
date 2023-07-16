<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{

    public function index(){
        return view('auth.forgot-password');
    }



    public function sendEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with('success' , __($status))
                    : back()->with('falied',__($status));

    }



    public function showResetForm($token){

        return view('auth.reset-password', ['token' => $token]);
    }

}
