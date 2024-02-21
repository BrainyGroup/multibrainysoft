<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Jobs\TenantWelcomeEmailJob;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->command('php artisan queue:work --queue=high,default')->everyMinute();

        // $schedule->command('model:prune', ['--model' => MonitoredScheduledTaskLogItem::class])->daily();

        // $schedule->job(new TenantWelcomeEmailJob)->everyMinute();
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
