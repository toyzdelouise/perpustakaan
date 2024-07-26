<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        return view('Autentifikasi/data');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required',
        ]);

        if($validator->passes()){
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' =>$request->password])) {
                if (Auth::guard('admin')->user()->role!= "admin") {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error','You Dont Have Access To Login');
                }
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('admin.login')->with('error','Either Email or Password is incorrect');
            };
        }else{
            return redirect()->route('admin.login')
            ->withInput()
            ->withErrors($validator);
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
