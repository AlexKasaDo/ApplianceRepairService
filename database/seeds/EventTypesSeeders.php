<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class EventTypesSeeders extends Seeder
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
        DB::table('status_jobs')->insert([
            ['name' => 'Unscheduled', 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Scheduled', 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'In Progress', 'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'On Hold',  'created_at' => now(), 'updated_at' => now(),],
            ['name' => 'Complete ',  'created_at' => now(), 'updated_at' => now(),],
                                         ]);
    }
}
