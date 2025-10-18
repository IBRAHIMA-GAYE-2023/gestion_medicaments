<?php

namespace App\Mail;

use App\Models\Medicament;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrendreMedicamentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $medicament;

    public function __construct(Medicament $medicament)
    {
        $this->medicament = $medicament;
    }

    public function build()
    {
        return $this->subject("⏰ Rappel : prenez votre médicament")
                    ->view('emails.prendre_medicament');
    }
}
