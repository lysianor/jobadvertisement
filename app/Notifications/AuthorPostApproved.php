<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AuthorPostApproved extends Notification implements ShouldQueue
{
    use Queueable;

    public $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        return ['mail','database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Your Post Successfully Approved!')
                    ->greeting('Hello, ' .$this->post->user->name . ' !')
                    ->line('Your post has been successfully approved.')
                    ->line('Post Title : ' . $this->post->title)
                    ->action('View', url(route('employer.post.show',$this->post->id)))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable) {
        return [
            'post_id' => $this->post->id,
            'slug' => $this->post->slug,
        ];
    }
}
