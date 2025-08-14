<?php

namespace App\Mail;

use App\Models\User; // <-- Важно добавить
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FollowUpEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public User $user; // <-- Важно добавить

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user) // <-- Важно добавить User $user
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
        return $this->subject('A quick tip from DoxTreet')
            ->view('emails.followup');
    }
}
