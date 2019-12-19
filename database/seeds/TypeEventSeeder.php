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
        DB::table('event_types')->insert([
            ['name' => 'Reminder'],
            ['name' => 'Work'],
            ['name' => 'Time-Off'],

        ]);
    }
}
