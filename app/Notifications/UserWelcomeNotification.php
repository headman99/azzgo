<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class UserWelcomeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(Lang::get('Registrazione completata su AzzGo!'))
            ->greeting(Lang::get('Ciao!'))
            ->line(Lang::get('Ti diamo il benvenuto in AzzGo,'))
            ->line(Lang::get('di seguito troverai le credenziali da te inserite per accedere al portale.'))
            ->line(Lang::get('Email :email', ['email' => $this->email]))
            //->line(Lang::get('Password :password', ['password' => $this->password]))
            //->action('Accedi', url('/'))
            ->line(Lang::get('Prima di poter accedere attendi la mail di corretta attivazione del tuo profilo.'))
            ->salutation(Lang::get('Distinti saluti'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
