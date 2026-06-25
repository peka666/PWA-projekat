<?php

namespace Database\Seeders;

use App\Models\Narudzbina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NarudzbinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Narudzbina::create([
            'user_id' => '1',
            'ukupno' => '2000',
            'datum' => "2026-6-20",
            'adresa' => "Bulevar Marsala Tolbuhina 6"
        ]);
        Narudzbina::create([
            'user_id' => '1',
            'ukupno' => '2200',
            'datum' => "2026-5-15",
            'adresa' => "Bulevar Marsala Tolbuhina 6"
        ]);
        Narudzbina::create([
            'user_id' => '1',
            'ukupno' => '1500',
            'datum' => "2026-4-15",
            'adresa' => "Bulevar Marsala Tolbuhina 6"
        ]);
        Narudzbina::create([
            'user_id' => '5',
            'ukupno' => '2000',
            'datum' => "2026-6-20",
            'adresa' => "Bulevar Vojvode Misica 40"
        ]);
        Narudzbina::create([
            'user_id' => '5',
            'ukupno' => '2000',
            'datum' => "2026-6-24",
            'adresa' => "Bulevar Vojvode Misica 40"
        ]);
    }
}
