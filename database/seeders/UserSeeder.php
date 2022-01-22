<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Chandra Perdiansyah',
            'username' => 'cperdiansyah',
            'email' => 'chandraperdiansyah@gmail.com',
            'password' => bcrypt('admin'),
            'is_admin' => true,
        ]);
        User::factory(5)->create();
    }
}
