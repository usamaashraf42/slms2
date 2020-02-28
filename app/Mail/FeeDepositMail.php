<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeeDepositMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $sheet;
    protected $data=array();
     // dd($this->$data);
    public function __construct($data,$sheet)
    {
     



        $data=$data;
        // dd($this->data);
        $this->$sheet=$sheet;
        

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

         // $emails = ['web@americanlyceum.com', 'accounts@americanlyceum.com', 'tnadeem@americanlyceum.com'];
      // $emails = ['web@americanlyceum.com'];
      $emails = ['shafqatghafoor99@gmail.com'];
     //  Mail::send('emails.missedMail', ['data'=>$missedFeeIdArray,'sheet'=>$sheedName], function($message) use ($emails){    
     //   $message->to($emails)->subject('Fee Deposited');    
     // });



        return $this->view('emails.missedMail')->cc($emails)->subject('Fee Deposited')->with($data, $sheet);

    }
}
