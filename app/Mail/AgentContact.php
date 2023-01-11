<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AgentContact extends Mailable
{
    use Queueable, SerializesModels;

    public $agentContact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($agentContact)
    {
        $this->agentContact = $agentContact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.AgentContact');
    }
}
