<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequset;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }



    public function register(RegisterRequset $request)
    {

        try{
            DB::beginTransaction();

            $validatedData=$request->validated();

            $email=$validatedData['email'];
    
            $name=explode('@',$validatedData['email'])[0];
    
            $password=md5($validatedData['password']);
    
            $createdUser=User::create(['name'=>$name,'email'=>$email,'password'=>$password,'role'=>'user']);
    
            Auth::login($createdUser);
    
            DB::commit();

            return redirect()->to(route('home'))->with('success','ثبت نام شما با موفقیت انجام شد');

        }catch(Exception $e){

            DB::rollBack();

            return back()->with('failed',$e->getMessage());

        }



    }


    
}
