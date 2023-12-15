<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Order::create([
            'buyer' => 'Eleazar Kubiak',
            'email' => 'mail@mail.com',
            'total' => '100.00 zł',
            'status' => 'Zrealizowane',
        ]);
        \App\Models\Order::create([
            'buyer' => 'Erast Grzesik',
            'email' => 'mail@mail.com',
            'total' => '120.00 zł',
            'status' => 'Zrealizowane',
        ]);
        \App\Models\Order::create([
            'buyer' => 'Hugo Golec',
            'email' => 'mail@mail.com',
            'total' => '40.00 zł',
            'status' => 'Zrealizowane',
        ]);
    }
}
