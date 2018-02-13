<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
  //Sends Password Reset emails
  use SendsPasswordResetEmails;
  //Shows form to request password reset
  public function showLinkRequestForm()
  {
    return view('user.passwords.email');
  }

  //Password Broker for users Model
  public function broker()
  {
    return Password::broker('users');
  }
}
