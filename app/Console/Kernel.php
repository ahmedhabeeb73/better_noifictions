<?php

namespace App\Console;

use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->call(function(){
        //   Log::info('inline task time').now();
        // })->everyMinute();
        $schedule->call(function () {
          $emails=  DB::table('contacts')->delete();
          $services=DB::table('services')->delete();
          $sendemail=DB::table('send_emails')->delete();
        })->everyMinute()->name("Delete All Emails, Services, Subscurpbe Email")
        // ->lastDayOfMonth('15:00')
        // ->everyMinute()
        ->emailOutputTo('alnaib888@gmail.com');
        // 

       
        
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
