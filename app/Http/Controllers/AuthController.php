<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuthModel;
use Validator;
use Auth;

class AuthController extends Controller {
  

  public function signin(Request $req) {

    if ($req->isMethod('get')) {
      $data['title'] = 'Golden Six | Sign In';
      return view('auth.signin', ['data' => $data]);
    }

    $validator = Validator::make($req->all(), [
      'email' => 'required', 'password' => 'required',
    ]);
    if ($validator->fails()) {
      return redirect('auth/signin')
      ->withErrors($validator)
      ->withInput();
    } 

    $credential = $req->only('email','password');
    if (Auth::attempt($credential)) {
      $user = Auth::user();
      if ($user->role == '1') {
        return redirect()->intended('member/dashboard');
      } elseif ($user->role == '2') {
        return redirect()->intended('personal_trainer/dashboard');
      }
      return redirect()->intended('member/dashboard');
    }

    return redirect('auth/signin')
    ->withErrors(['These credentials do not match our records.', 'variant' => 'danger'])
    ->withInput();
  }

  public function signout(Request $request) {
    $request->session()->flush();
    Auth::logout();
    return Redirect('auth/signin');
  }

}
