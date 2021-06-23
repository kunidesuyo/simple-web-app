<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signin()
    {
        return view('user.signin');
    }

    public function login(Request $request)
  {
    $email    = $request->input('email');
    $password = $request->input('password');
    if (!Auth::attempt(['email' => $email, 'password' => $password])) {
      // 認証失敗
      return redirect('/')->with('error_message', 'I failed to login');
    }
    // 認証成功
    return redirect()->route('micropost.index');
  }
}
