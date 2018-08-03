<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $primaryKey = 'id_message';
  protected $table      = 'tb_message';
}
