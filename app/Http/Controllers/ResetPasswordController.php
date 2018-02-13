<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
  //Seller redirect path
  protected $redirectTo = redirect()->route('index');

  //trait for handling reset Password
  use ResetsPasswords;

  //Show form to user where they can reset password
  public function showResetForm(Request $request, $token = null)
  {
    return view('user.passwords.reset')->with(
      ['token' => $token, 'email' => $request->email]
    );
  }

  //returns Password broker of user
  public function broker()
  {
    return Password::broker('user');
  }

  //returns authentication guard of user
  protected function guard()
  {
    return Auth::guard('guest');
  }
}
