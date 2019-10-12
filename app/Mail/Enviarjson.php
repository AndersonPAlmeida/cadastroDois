<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Enviarjson extends Mailable
{
    use Queueable, SerializesModels;  
    public $mensagem= '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Public $mensagem)
    {
        $this->mensagem= $mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('to@email.com')
                ->view('mail.treinaweb' , ['assunto'=>$mensagem])->subject('Teste');
    }
}
