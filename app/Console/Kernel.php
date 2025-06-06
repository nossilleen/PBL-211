<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Membersihkan data Telescope setiap hari
        // Defaultnya menyimpan data 48 jam (2 hari)
        $schedule->command('telescope:prune --hours=48')->daily();

        // Opsional: Bersihkan telescope yang lebih tua jika database mulai terlalu besar
        // $schedule->command('telescope:prune')->dailyAt('00:30');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
} 