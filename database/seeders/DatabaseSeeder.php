<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Book::factory(10)->create();

        $user = User::factory()->create([
            'username' => 'username',
            'email' => 'email@gmail.com',
            'password' => bcrypt("password")
        ]);
    }
}
