<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
  //Seller redirect path
  protected $redirectTo = '/';

  //trait for handling reset Password
  use ResetsPasswords;

  //Show form to user where they can reset password
  public function showResetForm(Request $request, $token = null)
  {
    return view('user.email.reset')->with(
      ['token' => $token, 'email' => $request->email]
    );
  }

  //returns Password broker of user
  public function broker()
  {
    return Password::broker('users');
  }

  //returns authentication guard of user
  protected function guard()
  {
    return Auth::guard('guest');
  }
}
