<?php

namespace guiaceliaca\Mail;

use guiaceliaca\Http\Requests\RespondCommerceToClientMessage;
use guiaceliaca\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RespondCommerceToClient extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $messageCommerce;

    public function __construct($messageCommerce)
    {
        $this->messageCommerce = $messageCommerce;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.MailRespondCommerceToClient')
            ->subject('Respuesta local Guía Celíaca');
    }
}
