<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusJobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_jobs')->insert([
                                             ['name' => 'Unscheduled'],
                                             ['name' => 'Scheduled'],
                                             ['name' => 'In Progress'],
                                             ['name' => 'On Hold'],
                                             ['name' => 'Completed'],
                                         ]);
    }
}
