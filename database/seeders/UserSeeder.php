<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        // user@pwa.rs user
        // editor@pwa.rs editor
        // admin@pwa.rs admin

        User::create([
            'name' => 'User1',
            'email' => 'user@pwa.rs',
            'password' => Hash::make('user'),
            'tip' => "registered"
        ]);

        User::create([
            'name' => 'Editor1',
            'email' => 'editor@pwa.rs',
            'password' => Hash::make('editor'),
            'tip' => "editor"
        ]);

        User::create([
            'name' => 'Admin1',
            'email' => 'admin@pwa.rs',
            'password' => Hash::make('admin'),
            'tip' => "admin"
        ]);
        User::create([
            'name' => 'Marko',
            'email' => 'mnikolic@raf.rs',
            'password' => Hash::make('admin'),
            'tip' => "admin"
        ]);
        User::create([
            'name' => 'Zeka',
            'email' => 'zekapeka@gmail.com',
            'password' => Hash::make('user'),
            'tip' => "registered"
        ]);
    }
}
