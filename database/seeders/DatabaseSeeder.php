<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //\App\Models\User::factory(10)->create();


        $var = \App\Models\Category::factory()->create([
            'name' => 'Bio'
        ]);

        \App\Models\Product::factory(5)->create([

            'category_id' => $var->id
        ]);


        $type = \App\Models\Category::factory()->create([

            'name' => 'Sold'
        ]);

        \App\Models\Product::factory(9)->create([

            'category_id' => $type->id
        ]);

        $alpha = \App\Models\Category::factory()->create([

            'name' => 'saison'
        ]);

        \App\Models\Product::factory(15)->create([

            'category_id' => $alpha
        ]);
    }
}
