<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FaturaMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $faturaPdf;

    /**
     * Cria uma nova instância.
     */
    public function __construct($faturaPdf, $user)
    {
        $this->faturaPdf = $faturaPdf;
        $this->user = $user;
    }

    /**
     * Constrói o e-mail.
     */
    public function build()
{
    return $this->subject('Sua Fatura - Bigode Grosso Store')
                ->view('fatura-email') // Certifique-se de que esta view existe
                ->attachData($this->faturaPdf, 'fatura.pdf', [
                    'mime' => 'application/pdf',
                ]);
}

}
