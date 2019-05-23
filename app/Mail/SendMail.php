<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        //$this->name=$name;
        $this->demo=$demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('mail',['msg'=>$request->message])->to($request->to);
        return $this->view('view.name');
        /* return $this->from('sender@example.com')
                    ->view('mails.demo')
                    ->text('mails.demo_plain')
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ])
                      ->attach(public_path('/images').'/demo.jpg', [
                              'as' => 'demo.jpg',
                              'mime' => 'image/jpeg',
                      ]); */
    }
    
}
