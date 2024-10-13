<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Artisan;

class RunPatientSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:seed-patients';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the PatientSeeder to seed patients data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //trigger seeder
        Artisan::call('db:seed', [
            '--class' => 'PatientSeeder',
        ]);

        $this->info('PatientSeeder executed successfully!');
        return 0;
    }
}
