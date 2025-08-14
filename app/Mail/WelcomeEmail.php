<?php

namespace App\Mail;

use App\Models\User; // Добавьте это
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user; // Добавили публичное свойство

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user) // Теперь мы принимаем пользователя
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Welcome to DoxTreet!')
            ->view('emails.welcome');
    }
}
