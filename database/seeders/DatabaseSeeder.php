<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => Str::random(10),
            'user_id' => Str::random(10),
            'phone' =>Str::random(10),
            'email'=>Str::random(10).'@gmail.com',
            'address'=>Str::random(10)
        });
    }
}
