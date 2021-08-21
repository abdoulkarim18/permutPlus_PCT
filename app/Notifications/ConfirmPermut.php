<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Apply;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmPermut extends Notification
{
    use Queueable;

    public $user;
    public $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Apply $message, User $user)
    {
        $this->data=$message;
        $this->user=$user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->line($this->user->nom .' '. $this->user->prenoms .' '. $this->data->message)
                    ->action('Profil', url('profile'))
                    ->line('Thank you for using our application!');
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
           'customRequestId' => $this->data->customrequest_id,
           'nom' => $this->user->nom,
           'prenoms' => $this->user->prenoms,
           'userId' => $this->user->id,
           'isAccepted' => $this->data->isAccepted,
           'message' => $this->data->isAccepted==1? 'a accepté votre offre':'a refusé votre offre',
        ];
    }
}
