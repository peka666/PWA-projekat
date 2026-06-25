<?php

namespace Database\Seeders;

use App\Models\Korpa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KorpaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Korpa::create([
            'user_id' => "1",
            "proizvod_id" => "1",
            "kolicina" => "1",
        ]);
        Korpa::create([
            'user_id' => "1",
            "proizvod_id" => "2",
            "kolicina" => "2",
        ]);
        Korpa::create([
            'user_id' => "1",
            "proizvod_id" => "3",
            "kolicina" => "1",
        ]);
        Korpa::create([
            'user_id' => "5",
            "proizvod_id" => "1",
            "kolicina" => "2",
        ]);
        Korpa::create([
            'user_id' => "5",
            "proizvod_id" => "5",
            "kolicina" => "2",
        ]);
    }
}
