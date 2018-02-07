<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
  public function postSignup(Request $request)
  {
    $this->validate($request,[
      'name'      => 'required',
      'username'  => 'required|unique:tb_user',
      'email'     => 'email|required|unique:tb_user',
      'password'  => 'required|min:4'
    ]);

    $user = new User([
      'name' => $request->input('name'),
      'username' => $request->input('username'),
      'email' => $request->input('email'),
      'password' => bcrypt($request->input('password'))
    ]);
    $user->save();
    Auth::login($user);
    return redirect()->route('index');
  }

  public function postSignin(Request $request){
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required|min:4'
    ]);

    if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
      return redirect()->route('index');
    }
    return redirect()->back();
  }

  public function getProfile(){
    return view('user.index');
  }

  public function getLogout(){
    Auth::logout();
    return redirect()->back();
  }
}
