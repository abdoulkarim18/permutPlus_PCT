<?php

namespace App\Notifications;

use App\Models\Apply;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostulPermutation extends Notification
{
    use Queueable;

    protected $apply;
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Apply $customRequest, User $user)
    {
        $this->customRequest = $customRequest;
        $this->user = $user;
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
                    ->line('
                    Je suis '. $this->user->nom .' '. $this->user->prenoms .' , je souhaite effectuer
                    une permutation avec vous, je suis à la DREN' . $this->customRequest->odren.'
                    à l\'etablissement '. $this->customRequest->oschool.'. Vous pouvez me contacter
                    aux adresses suivantes : ' . $this->customRequest->phone . ', ' . $this->customRequest->email .'' )
                    ->action('Répondre', url('profile'))
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
            'customRequestId'=> $this->customRequest->customrequest_id,
            'odren' => $this->customRequest->odren,
            'sdren' => $this->customRequest->sdren,
            'oiep' => $this->customRequest->oiep,
            'siep' => $this->customRequest->siep,
            'oschool' => $this->customRequest->oschool,
            'userId' => $this->user->id,
            'isAccepted'=> 0,
            'message' => 'a postulé à votre offre',
            'nom' => $this->user->nom,
            'prenoms' => $this->user->prenoms,
            'email' => $this->user->email,
            'contact' => $this->user->contact,
        ];
    }
}
