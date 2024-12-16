<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomVerifyEmail extends Notification
{
    use Queueable;

    protected $verificationUrl;

    public function __construct($verificationUrl)
    {
        $this->verificationUrl = $verificationUrl;
    }

    /**
     * Define os canais de entrega.
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Gera o email de verificação.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Verifique seu endereço de email')
            ->greeting('Olá!')
            ->line('Por favor, clique no botão abaixo para verificar seu endereço de email.')
            ->action('Verify Email Address', $this->verificationUrl)
            ->line('Se você não criou uma conta, nenhuma ação adicional é necessária.')
            ->salutation('Atenciosamente, Laravel');
    }
}
