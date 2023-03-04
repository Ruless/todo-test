<?php

namespace App\Console;

use App\Models\Task;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            info('SHEDUL_TEST');
            $model = Task::latest('id')->first();
            $id = $model->id - 1;
            if ( Task::count() >= 2 ) {
                $test = Task::where('id', '<', $id)->latest('id')->first();
                $test->complite = true;
                $test->save();
            }
        })->everyFiveMinutes();
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
