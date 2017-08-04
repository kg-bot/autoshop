<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // BMW category
        factory(Category::class)->create([
            'name' => 'BMW',
        ]);
        // Mercedes category
        factory(Category::class)->create([
            'name' => 'Mercedes',
        ]);
        // Audi category
        factory(Category::class)->create([
            'name' => 'Audi',
        ]);
    }
}