<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Authentification extends Controller
{
    public function index()
    {
        return view("desain/login");
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                if ($user->role == 'admin') {
                    return redirect()->route('admin.tampilan');
                } else {
                    return redirect()->route('account.dashboard');
                }
            } else {
                return redirect()->route('account.login')->with('error', 'Either Email or Password is incorrect');
            }
        } else {
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function register()
    {
        return view('desain/register');
    }

    public function ProcessRegister(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ]);

        if($validator->passes()){
            $user = new User();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->role = 'pengguna';
            $user->save();

            return redirect()->route('account.login')->with('succes','Anda Berhasil Register');
        }else{
            return redirect()->route('account.register')
            ->withInput()
            ->withErrors($validator);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }

}
