<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ServicesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('services')->insert([
            ['name' => 'Acne Clear', 'description' => 'Treatment untuk mengatasi jerawat meradang ringan serta kulit lebih bersih', 'price' => 250000],
            ['name' => 'Acne Glow', 'description' => 'Treatment untuk mengatasi jerawat aktif serta kulit lebih berkilau', 'price' => 200000],
            ['name' => 'Clear Bright', 'description' => 'Facial peeling untuk membersihkan wajah, wajah jadi bersih', 'price' => 199000],
            ['name' => 'Breakout Free', 'description' => 'Treatment atasi wajah bruntusan, kulit jadi halus dan sehat', 'price' => 200000],
            ['name' => 'Korean Light', 'description' => 'Atasi minyak berlebih, dan kulit glowing', 'price' => 500000],
            ['name' => 'Korean Glass Skin Bright', 'description' => 'Samarkan kerutan halus, kulit cerah dan glowing ternutrii', 'price' => 699000],
            ['name' => 'Glow DNA Salmon', 'description' => 'Pico DNA Salmon Glow Laser untuk memudarkan bekas jerawat hitam', 'price' => 900000],
            ['name' => 'Fresh Rehydrate', 'description' => 'Treatment untuk atasi kulit kusam, kulit jadi cerah dan fresh', 'price' => 200000],
            ['name' => 'Skin Barrier Healer', 'description' => 'Efektif atasi kulit sunburn dan kemerahan', 'price' => 185000],
            ['name' => 'Translucent Booster', 'description' => 'Efektif memudarkan flek hitam, dilengkapi dengan anti aging', 'price' => 199000],
        ]);
    }
}
