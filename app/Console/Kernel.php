<?php

namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\dailycheckcommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->command('daily-check')->dailyAt('00:01');

        // $schedule->call(function() {
            

        //     // get contestant where contestant->answers == game where inprogress = true->correctAnswers, set contestant->winner=true
        //     // 
        //     // if carbonCurrentDate = game where inprogress = true -> endDate then inprogress = false
        //     // get game where startDate = carbonCurrentDate -> set inprogress = true




        //     // DB::table('answers')->where('')

        // })->dailyAt('00:01');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
