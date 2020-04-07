<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewAuthorPost extends Notification implements ShouldQueue
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
                    ->greeting('Hello, Admin!')
                    ->subject('New Post Approval Needed')
                    ->line('New Post by '.$this->post->user->name . ' need to approve.')
                    ->line('To approve the post click view button.')
                    ->line('Post Title : '. $this->post->title)
                    ->action('View', url(route('admin.post.show',$this->post->id)))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable) {
        return [
            'post_id' => $this->post->id,
            'slug' => $this->post->slug,
            'image' => $this->post->user->image,
        ];
    }

}
