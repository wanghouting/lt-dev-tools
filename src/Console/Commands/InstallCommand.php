<?php

namespace LTTools\Extension\Console\Commands;

use Illuminate\Console\Command;
use LTTools\Extension\Database\Seeders\LTToolsDatabaseSeeder;

class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'lttools:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the lt travel dev tools package';

    /**
     * Install directory.
     *
     * @var string
     */
    protected $directory = '';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->initDatabase();

    }

    /**
     * Create tables and seed it.
     *
     * @return void
     */
    public function initDatabase()
    {
        !is_dir(storage_path('logs/lttools')) && mkdir(storage_path('logs/lttools'),0777,true);
        $this->call('migrate');
        $this->call('vendor:publish', ['--provider'=> "LTTools\Extension\LaravelServiceProvider"]);
        $this->call('vendor:publish', ['--provider'=> "WebConsole\Extension\LaravelServiceProvider"]);
        $this->call('vendor:publish',['--provider' => "Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider"]);
        $this->call('db:seed', ['--class' => LTToolsDatabaseSeeder::class]);
    }


}
