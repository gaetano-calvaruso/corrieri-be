<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ── Utenti di test ───────────────────────────────────────────────────────
        // email: giulia.bianchi@gmail.com  password: Test1234!
        User::create([
            'name'     => 'Giulia',
            'surname'  => 'Bianchi',
            'email'    => 'giulia.bianchi@gmail.com',
            'password' => Hash::make('Test1234!'),
            'phone'    => '347 8821034',
            'address'  => 'Via Nazionale 45, Roma',
        ]);

        // email: luca.ferrari@gmail.com  password: Test1234!
        User::create([
            'name'     => 'Luca',
            'surname'  => 'Ferrari',
            'email'    => 'luca.ferrari@gmail.com',
            'password' => Hash::make('Test1234!'),
            'phone'    => '333 5561290',
            'address'  => 'Corso Vittorio Emanuele 12, Roma',
        ]);

        $this->call([
            PickupPointSeeder::class,
            PackageSeeder::class,
        ]);
    }
}
