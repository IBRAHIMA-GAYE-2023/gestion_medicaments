<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Medicament;
use App\Models\PriseMedicament;
use Illuminate\Support\Facades\Mail;
use App\Mail\PrendreMedicamentMail;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Exécuté toutes les minutes
        $schedule->call(function () {

            $now = now()->format('H:i'); // format heure:minute

            // Récupérer tous les médicaments
            $medicaments = Medicament::all();

            foreach ($medicaments as $med) {
                // Heure du médicament formatée HH:MM
                $heure_med = \Carbon\Carbon::parse($med->heure_a_prendre)->format('H:i');

                if ($heure_med === $now) {
                    // Récupérer tous les étudiants qui ont pris ce médicament aujourd'hui
                    $prises = PriseMedicament::where('medicament_id', $med->id)
                                ->whereDate('created_at', now()->toDateString())
                                ->get();

                    foreach ($prises as $prise) {
                        $user = $prise->user;

                        try {
                            Mail::to($user->email)->send(new PrendreMedicamentMail($med));
                        } catch (\Exception $e) {
                            \Log::error("Erreur envoi mail: ".$e->getMessage());
                        }
                    }

                    // Optionnel : mettre à jour une colonne last_notified_at pour éviter double envoi
                    $med->update(['last_notified_at' => now()]);
                }
            }
        })->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
