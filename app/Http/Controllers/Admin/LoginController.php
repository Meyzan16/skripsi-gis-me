<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {

        return view('admin.main.login');
    } 

public function authenticate(Request $request)
{
    //pasang rules
    $rules = [
        'username' => 'required',
        'password'=> 'required|min:8'
    ];

    //pasang pesan kesalahan
    $messages = [
        'username.required'     => 'nisn bersifat numerik',
        'password.min'     => 'Password minimal 8 karakter',
    ];

    //ambil semua request dan pasang rules dan isi pesanya
    $validator = Validator::make($request->all(), $rules, $messages);
    //jika rules tidak sesuai kembalikan ke login bawak pesan error dan bawak request nya agar bisa dipakai denga old di view
    if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
    }


     //jika berhasil jalankan script berrikut
     if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){  
        // return "benar";
        $request->session()->regenerate();
        return \redirect()->route('dashboard')->with('success', 'Selamat datang '. auth()->user()->name.' '  );

    }else{
        return back()->with('loginerror', 'Username Dan Password Salah');
    }
}

    public function logout(Request $request){

        Auth::logout();

        //invalid session supaya tidak bisa dipakai
        $request->session()->flush();
        $request->session()->invalidate();
        //bikin token baru supaya tidak dibajak
        $request->session()->regenerateToken();
        //redirect ke halaman mana
        return \redirect()->route('connexion');
    }
}
