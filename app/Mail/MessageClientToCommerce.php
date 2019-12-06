<?php

namespace guiaceliaca\Mail;

use guiaceliaca\Commerce;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageClientToCommerce extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $commerce;

    public function __construct(Commerce $commerce)
    {
        $this->commerce = $commerce;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.MessageClientToCommerce')
            ->subject('Mensaje en GuíaCelíaca')
            ->from('no-respond@guiaceliaca.com.ar');
    }
}
