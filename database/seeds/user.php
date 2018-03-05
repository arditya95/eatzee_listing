<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user->name = 'ardit';
      $user->username = 'ardit';
      $user->password = bcrypt('123456');
      $user->email = 'putuarditya@gmail.com';
      $user->verified = 1;
      $user->save();
    }
}
