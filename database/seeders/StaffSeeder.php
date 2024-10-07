<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    public function run()
    {
        DB::table('staff')->insert([
            [
                'name' => 'Dr. Fina',
                'email' => 'fina@nemara.com',
                'role' => 'doctor',
            ],
            [
                'name' => 'Tejo',
                'email' => 'tejo@admin1.com',
                'role' => 'admin',
            ],
        ]);
    }
}
