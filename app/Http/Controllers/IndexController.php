<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * This method is used only for home page, showing vehicles when user goes to home page.
     */
    public function index(Request $request)
    {
        $category = ($request->has('category')) ? $request->category : 'BMW';

        // We need to get first 12 vehicles from BMW category
        $vehicles = Vehicle::where([
                ['approved', 1],
                ['category', $category],
        ])->simplePaginate(config('pagination.per_page'));

        $carousel_images = [];

        foreach ($vehicles as $vehicle) {
            array_push($carousel_images, $vehicle->image_path);
        }
        // If this is  AJAX call we need to list just vechiles
        if ($request->ajax()) {
            return view('partials.ajax_vehicles', ['vehicles' => $vehicles, 'carousel_images' => $carousel_images, 'category' => $category]);
        }

        $categories = Category::all();

        return view('templates.home', ['vehicles' => $vehicles, 'categories' => $categories, 'carousel_images' => $carousel_images, 'category' => $category]);
    }

    public function showAdminPanel(Request $request)
    {
        return view('admin.index');
    }
}
