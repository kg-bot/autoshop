<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $vehicles = Vehicle::simplePaginate(config('pagination.per_page'));

        return view('admin.index', ['vehicles' => $vehicles]);
    }

    public function addCategory(Request $request)
    {
        Category::firstOrCreate(['name' => $request->name]);

        return redirect('/admin');
    }

    public function deleteVehicle(Request $request)
    {
        Vehicle::destroy($request->id);

        return response('Success', 200);
    }

    public function approveVehicle(Request $request)
    {
        Vehicle::find($request->id)
                ->update(['approved' => 1]);

        return response('Success', 200);
    }
}
