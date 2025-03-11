<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stages')->insert([

            [
                'name' => 'الصف الاول',
            ],

            [
                'name' => 'الصف الثاني',
            ],

            [
                'name' => 'الصف الثالث',
            ],

            [
                'name' => 'الصف الرابع',
            ],

            [
                'name' => 'الصف الخامس',
            ],
            
            [
                'name' => 'الصف السادس',
            ],

        ]);
    }
}
