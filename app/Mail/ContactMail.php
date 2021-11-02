<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    //pass the data
    public $data;
    use Queueable, SerializesModels;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        //define the subject line
        $subject = $this->data['name'] .' send a message on '.$this->data['subject'];
        return $this->markdown('emails.contactMail')
            ->subject($subject)
            ->with([
                'data'=>$this->data
            ]);


    }
}
