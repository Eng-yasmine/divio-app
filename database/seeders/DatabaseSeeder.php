<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        User::factory(1)->create([

            'email' => 'yasmeen@yahoo.com',
            'password' => bcrypt('123456789'),
            'role'=>'admin',
        ]);
        $this->call([
            PostSeeder::class,
            SettingSeeder::class,

        ]);
    }
}
