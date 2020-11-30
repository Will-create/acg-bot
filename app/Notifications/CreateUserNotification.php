<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateUserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $result)
    {
        $this->user = $user;
        $this->password = $result;
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
        $url = Route('accueil');

        return (new MailMessage)
        ->subject("Criminalité environnementale")
        ->greeting('Bonjour '. $this->user->nom.' !')
        ->line('Vous avez été ajouté à la plateforme de gestion des crimes environnementaux en tant que  '. $this->user->role->designation. ' ')
        ->line("Veuillez vous connecter avec  l'identifiant ". $this->user->email. " et le mot de passe  ". $this->password. "   pour plus d'information " )
        ->action('Connexion', $url);
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
