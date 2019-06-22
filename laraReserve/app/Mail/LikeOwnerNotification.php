<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Like;
use Log;

class LikeOwnerNotification extends Mailable
{
    use Queueable, SerializesModels;

    private $like;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Like $argLike)
    {
        $this->like = $argLike;
        $this->title = $argLike->getCourseTitle() . "がイイねされました";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.likeOwner')
                    ->text('emails.likeOwner_plain')
                    ->subject($this->title)
                    ->with([
                        'like' => $this->like,
                      ]);
    }
}
