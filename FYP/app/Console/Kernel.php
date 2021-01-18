<?php

namespace App\Console;

use App\Post;
use DateTimeZone;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $locale = new DateTimeZone('Asia/Kuala_Lumpur');
        $currentTime = Carbon::now($locale);
        $currentDate = Carbon::today();
        $posts = Post::where([
            ['date', '<', $currentDate],
            ['has_broadcast','=', false]
        ])->get();

        foreach ($posts as $post) {
            $command = 'mail:send ' . $post->id;
            $schedule->command($command)->daily();
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
