<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\LoginFailedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){

        

        try{

            $validatedData=$request->validated();

            $password=md5($validatedData['password']);

            $remeber=isset($validatedData['rememberme'])? true: false;
            
            if (Auth::attempt(['email' => $validatedData['email'], 'password' => $password],$remeber)) {

                
                return redirect()->intended()->with('success',' ورود با موفقیت انجام شد');
                
            }
            
            throw new LoginFailedException('ورود انجام نشد'); 
            


        }catch(Exception $e)
        {

            return back()->with($e->getMessage());

        }





    }


    public function logout()
    {
        Auth::logout();
         return back();
    }
}
