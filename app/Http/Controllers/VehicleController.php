<?php

namespace App\Http\Controllers;

use FluentDOM;
use App\Models\Vehicle;
// Validation
use Illuminate\Http\Request;
// DOM parsing
use App\Http\Requests\AddNewVehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewVehicle $request)
    {
        if ($request->category != 'Audi') {
            // We need to save image file to image/cars directory
            $image = $request->file('image')->store('', 'cars');
            Vehicle::create([
                'category' => $request->category,
                'name' => $request->name,
                'price' => $request->price,
                'year' => $request->year,
                'kilometers' => $request->kilometers,
                'image_path' => $image,
                'added_by' => auth()->id(),
            ]);
            $request->session()->flash('vehicle-added', 'Your vehicle is waiting for approval.');

            return redirect('/');
        } else {
            $request->flash('error', 'You can\'t add new vehicles into this category.');

            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vechile  $vechile
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vechile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vechile  $vechile
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vechile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vechile  $vechile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vechile $vechile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vechile  $vechile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vechile)
    {
        //
    }

    /**
     * This is used to fetch external Auto Shop Audi Resources and save them to Database.
     */
    public function fetchAudi()
    {
        $url = 'https://www.polovniautomobili.com/putnicka-vozila/pretraga?brand=38&price_from=40000&without_price=1&showOldNew=all';

        $html = file_get_contents($url);
        $dom = FluentDOM::QueryCss($html, 'text/html');

        $cars = \Helpers::get_cars($dom);

        if (count($cars)) {
            // Now we need to save external cars to database
            foreach ($cars as $car) {
                $car['category'] = 'Audi';
                $car['added_by'] = auth()->id();
                $car['approved'] = 1;
                // We need to check if this car already exists so we use firstOrCreate instead of create method
                /**
                 * TODO: maybe exclude image_path before we call create method and use firstOrNew to add image_path and then save(),
                 * because each time image_path is unique and we will always get new instance of Vehicle even if everything else is same,
                 * or maybe you wanted to clear Audi vehicles each time and add new, updated cars?
                 */
                $vehicle = Vehicle::firstOrCreate($car);

                // We will probably call this method over AJAX and update category view over JavaScript
                // that's why we will just return json of added cars
                $vehicles[] = $vehicle;
            }

            // Now we need to create pagination of this vehicles
            $vehicles_pagination = \Helpers::create_pagination($vehicles, config('pagination.per_page'));

            $carousel_images = [];

            foreach ($vehicles_pagination as $vehicle) {
                array_push($carousel_images, $vehicle->image_path);
            }

            return \View::make('partials.ajax_vehicles', ['vehicles' => $vehicles_pagination, 'carousel_images' => $carousel_images, 'category' => 'Audi']);
        }
    }
}
