<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
  protected $primaryKey = 'user_id_user';
  protected $table      = 'followables';
}
