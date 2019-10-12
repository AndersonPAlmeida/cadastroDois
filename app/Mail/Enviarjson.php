<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mensagem;

class Enviarjson extends Mailable
{
    use Queueable, SerializesModels;  
    public $mensagem;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Mensagem $msg)
    {
        $this->mensagem = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        
        return $this->from('to@email.com')
                ->view('mail.treinaweb' , ['assunto'=>$this->mensagem->mensagem])
                ->subject($this->mensagem->assunto);
    }
}
