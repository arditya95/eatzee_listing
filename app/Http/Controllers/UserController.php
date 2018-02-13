<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
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

  public function postProfile(Request $request){
    $user = User::find($request->id);

    $this->validate($request,[
      'name'      => 'required',
      'email'     => 'email|required|unique:tb_user,email,'.$request->id.',id_user',
      'img',
      'twitter',
      'facebook',
      'google',
    ]);

    if($request->hasFile('img')) {
      if ($user->img != null) {
        $fileSystem = new Filesystem;
        $fileSystem->delete(public_path($user->img));
      }
      $path = Storage::disk('uploads')->put('uploads/avatar', $request->file('img'));
      $user->img = $path;
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->twitter = $request->twitter;
    $user->facebook = $request->facebook;
    $user->google = $request->google;
    $user->save();

    return redirect()->back();
  }

  public function delete(Request $request)
  {
      $user = User::findOrFail($request->id);
      if ($user->img != null) {
          $fileSystem = new Filesystem;
          $fileSystem->delete(public_path($user->img));
      }
      $hapus = $user->delete();
  }

  public function postPass(Request $request){
    $user = User::find($request->id);

    $this->validate($request,[
      'name'      => 'required',
      'email'     => 'email|required|unique:tb_user,email,'.$request->id.',id_user'
    ]);

    $this->validate($request, [
      'password' => 'required|min:4',
      'password1' => 'required|min:4|unique:tb_user,password,'.$request->id.',id_user',
      'password2' => 'required|min:4|unique:tb_user,password,'.$request->id.',id_user',
    ]);

    $user->password = $request->password1;
    $user->save();

    return redirect()->back();
  }

  public function getLogout(){
    Auth::logout();
    return redirect()->back();
  }
}
