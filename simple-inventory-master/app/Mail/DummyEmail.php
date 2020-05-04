<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DummyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
                    ->view('emails.dummy')       // ini nih buat template emailnya disini juga bisa diparsing data ke emails/dummy.blade.php
                    ->with([
                      'pembuka' => ' Salam kenal yaa aku abyan dari tahun 2020',
                      'isi'    => 'aku ngirim email loh dari tahun 2020 buat diriku dimmasa depan .. aku harap saat buka email ini aku uda sukses Aamiin',
                      'penutup'=> 'Semoga aku selalu ingat tujuan hidupku ..'
                    ]);
    }
}
