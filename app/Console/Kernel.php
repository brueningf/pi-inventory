<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\File;
use function foo\func;

class Kernel extends ConsoleKernel {

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
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('backup:clean')->daily()->at('13:00');
        $schedule->command('backup:run')->daily()->at('13:05')
            ->onFailure(function () {
                $data = var_export(['checked' => false], 1);
                File::put(config_path() . '/backup_health.php', "<?php\n return $data;");

            })
            ->onSuccess(function () {
                $data = var_export(['checked' => true], 1);
                File::put(config_path() . '/backup_health.php', "<?php\n return $data;");
            });

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
