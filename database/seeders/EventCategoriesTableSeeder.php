<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_categories')->insert([
            [
                'title'=>'Session',
                'slug'=>'session',
            ],
            [
                'title'=>'Webinar',
                'slug'=>'webinar',
            ],
            [
                'title'=>'Workshop',
                'slug'=>'workshop',
            ],
        ]);
    }
}
