<?php

namespace Database\Seeders;

use App\Models\Korpa;
use App\Models\User;
use Database\Seeders\NarudzbinaSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProizvodSeeder::class,
            NarudzbinaSeeder::class,
            KorpaSeeder::class
        ]);
    }
}
