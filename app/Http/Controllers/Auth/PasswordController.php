<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Jobs\SendEmailJob;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


class PasswordController extends Controller
{

    public function index(){
        return view('auth.forgot-password');
    }



    public function sendEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        dispatch(new SendEmailJob($request->only('email')));

        return back()->with('success','ایمیل بازیابی برای شما ارسال شد');
    }



    public function showResetForm($token){

        return view('auth.reset-password', ['token' => $token]);
    }



    public function resetPassword(ResetPasswordRequest $request)
    {
        $validatedData=$request->validated();
    
        
    $status = Password::reset(
       $validatedData,
        function (User $user, string $password) {
            $user->forceFill([
                'password' => md5($password)
            ])->setRememberToken(Str::random());
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('auth.login')->with('success','پسورد شما با موفقیت بازیابی شد')
                : back()->withErrors(['email' => [__($status)]]);
        
    }

}
