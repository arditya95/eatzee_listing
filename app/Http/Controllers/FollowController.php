<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;

class FollowController extends Controller
{
  // public function FollowResto($resto, $id){
  //   $user = User::find($id);
  //   $user->unfollow($resto);
  //   return $user;
  //   // $user->unfollow($targets);
  //   // $user->follow($targets);
  //   // $user->unfollow($targets);
  // }

  public function GetFollowResto(){
    $user_bookmark = Follow::all();

    return response()->json([
        'bookmark' => $bookmark_resto
    ]);
  }

  public function FollowResto(request $request){
    $bookmark_resto = User::select('id_user')->find($request->id_user);
    if ($request->status == 1) {
      $bookmark_resto->follow($request->id_resto);
      $status = 'unfollow';
    } else {
      $bookmark_resto->follow($request->id_resto);
      $status = 'follow';
    }
    return response()->json([
        'bookmark' => $status
    ]);
  }
}
