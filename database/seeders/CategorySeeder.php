<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name' => 'Mukena Dewasa',
            'slug' => 'mukena-dewasa',
        ]);

        Category::create([
            'name' => 'Sajadah',
            'slug' => 'sajadah',
        ]);

        Category::create([
            'name' => 'Mukena Anak',
            'slug' => 'mukena-anak',
        ]);

        Category::factory(5)->create();
    }
}
