<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;
use Auth;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Mail\SendVerificationEmail;

class UserController extends Controller
{
  // public function postSignup(Request $request)
  // {
  //   $this->validate($request,[
  //     'name'      => 'required',
  //     'username'  => 'required|unique:tb_user',
  //     'email'     => 'email|required|unique:tb_user',
  //     'password'  => 'required|min:4'
  //   ]);
  //
  //   $user = new User([
  //     'name' => $request->input('name'),
  //     'username' => $request->input('username'),
  //     'email' => $request->input('email'),
  //     'password' => bcrypt($request->input('password')),
  //     'email_token' => base64_encode($request->input('email'))
  //   ]);
  //   $user->save();
  //   Auth::login($user);
  //   return redirect()->route('index');
  // }

  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|string|max:255',
          'username' => 'required|string|max:255|unique:tb_user',
          'email' => 'required|string|email|max:255|unique:tb_user',
          'password' => 'required|string|min:6|confirmed',
      ]);
  }

  protected function create(array $data)
  {
      return User::create([
          'name' => $data['name'],
          'username' => $data['username'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
          'email_token' => base64_encode($data['email'])
      ]);
  }

  public function register(Request $request)
  {
    // $this->validator($request->all())->validate();
    event(new Registered($user = $this->create($request->all())));
    dispatch(new SendVerificationEmail($user));
    return view('user.email.verification');
  }

  public function verify($token)
  {
    $user = User::where('email_token', $token)->first();
    $user->verified = 1;
    if($user->save()){
      return view('user.email.emailconfirm', ['user'=>$user]);
    }
  }

  public function postSignin(Request $request){
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required|min:4'
    ]);

    if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password'), 'verified' => 1])) {
      return redirect()->route('index');
    }
    return redirect()->back()->with(['failed' => 'false']);
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
