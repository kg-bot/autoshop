<?php

use Illuminate\Database\Seeder;

use App\Models\Vehicle;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * BMW
         */
        factory(Vehicle::class)->create([
            'name' => 'BMW M240i Convertible',
            'image_path' => 'BMW-2series-cabrio-imagesandvideos-1920x1200-13.jpg'
        ]);
        factory(Vehicle::class)->create([
            'name' => 'BMW i8',
            'year' => 2017,
            'image_path' => '7821.jpg'
        ]);

        /**
         * Mercedes
         */
        factory(Vehicle::class)->create([
            'category' => 'Mercedes',
            'name' => 'Mercedes-AMG GT R',
            'image_path' => 'Mercedes-Benz-Vehicles-AMG-GT-R.jpg'
        ]);
        factory(Vehicle::class)->create([
            'category' => 'Mercedes',
            'name' => 'The E-Class Saloon',
            'image_path' => 'e-class-saloon.jpg'
        ]);
    }
}