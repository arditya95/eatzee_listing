<?php

namespace App\Mail;

use Mail;
use App\Mail\EmailReservation;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendReservationEmail implements ShouldQueue
{
  protected $user;
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
     public function __construct($user)
     {
       $this->user = $user;
     }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $email = new EmailReservation($this->user);
      Mail::to($this->user->email)->send($email);
    }
}
