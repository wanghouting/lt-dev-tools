<?php

namespace LTUpdate\Extension\Console\Commands;

use Illuminate\Console\Command;
use LTUpdate\Extension\Database\Seeders\LTUpdateDatabaseSeeder;

class InstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'ltupdate:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the lt travel update package';

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
        !is_dir(storage_path('logs/update')) && mkdir(storage_path('logs/update'),0777,true);
        $this->call('migrate');
        $this->call('vendor:publish', ['--provider'=> "LTUpdate\Extension\LaravelServiceProvider"]);
        $this->call('db:seed', ['--class' => LTUpdateDatabaseSeeder::class]);
    }


}
