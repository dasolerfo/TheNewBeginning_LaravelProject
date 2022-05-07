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
        \DB::table('users')->insert([
            'name'=> 'admin',
            'userName'=> 'ADMIN',
            'password'=>bcrypt('admin2022'),
            'email' => 'admin@admin.cat',
            'pais'=> 'Espanya',
            'admin' => true
        ]);
        // User::factory(10)->create();
    }
}
