<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reserve;
use Log;

class ReserveUserNotification extends Mailable
{
    use Queueable, SerializesModels;

    private $reserve;
    private $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reserve $argReserve)
    {
        $this->reserve = $argReserve;

        $this->title = $argReserve->getCourseTitle() . "へのご予約ありがとうございます";
        $this->text = "sample";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::debug('ReserveUserNotification build');

        return $this->view('emails.reserveUser')
                    ->text('emails.reserveUser_plain')
                    ->subject($this->title)
                    ->with([
                        'reserve' => $this->reserve,
                      ]);
    }
}
