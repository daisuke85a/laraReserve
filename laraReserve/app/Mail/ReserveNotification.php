<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reserve;

class ReserveNotification extends Mailable
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

        $this->title = $argReserve->getCourseTitle() . "に予約が入りました！";
        $this->text = "sample";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.notification')
                    ->text('emails.notification_plain')
                    ->subject($this->title)
                    ->with([
                        'reserve' => $this->reserve,
                      ]);
    }
}
