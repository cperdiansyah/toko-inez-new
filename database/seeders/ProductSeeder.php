<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'name' => 'Mukena Anak',
            'slug' => 'mukena-anak',
            'description' => 'Mukena Anak',
            'price' => '10000',
            'quantity' => '10',
            'category_id' => '3',
            'weight' => '10',
        ]);
        Product::factory(6)->create();
    }
}
