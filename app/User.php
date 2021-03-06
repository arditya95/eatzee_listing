<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
//Notification for User
use App\Notifications\UserResetPasswordNotification;

class User extends Authenticatable
{
    protected $primaryKey = 'id_user';
    protected $table      = 'tb_user';
    use CanFollow, CanBeFollowed;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'verified', 'email_token', 'img', 'twitter', 'facebook', 'google'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Send password reset notification
    public function sendPasswordResetNotification($token)
    {
      $this->notify(new UserResetPasswordNotification($token));
    }
}
