<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function view_login(){
        return view('auth.login');
    }

    public function view_register(){
        return view('auth.register');
    }

    public function create_register(Request $request){

      $this->validate($request,[
        'name' =>'required',
        'nama_lengkap' =>'required',
        'email' =>'required|unique:users,email',
        'alamat'=>'required',
        'password' => 'required|min:8',

      ],[
        'name.required' => 'Nama tidak boleh kosong',
        'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong',
        'email.required' => 'Email tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong',
        'password.min' => 'Password minimal 8 karakter',
        'email.unique' => 'Email sudah terdaftar',
      ]);

      User::create([
        'name' => $request->name,
        'nama_lengkap' => $request->nama_lengkap,
        'email' => $request->email,
        'alamat' => $request->alamat,
        'password' =>Hash::make($request->password)

    ]);

    return redirect()->route('login')->with('success', 'berhasil register!');
    }

    public function create_login(Request $request){
        $this->validate($request,[
            'email' =>'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $credentials = $request->only('email', 'password');

        if(auth()->attempt($credentials)){
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', 'Email atau password salah');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dashboard');
    }
}
