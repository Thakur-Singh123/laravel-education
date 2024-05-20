<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $newContact;

    public function __construct($newContact)
    {
        $this->newContact = $newContact; 
    }

    public function build()
    {
        return $this->subject('Mail from singhthakur906@gmail.com')
                    ->view('contact-submitted');
    }
}
