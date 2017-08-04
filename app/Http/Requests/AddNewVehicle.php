<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Vehicle;

class AddNewVehicle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        return $this->user()->can('create', Vehicle::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category'     => 'required|exists:categories,name',
            'name'         => 'required',
            'price'        => 'required|integer',
            'year'         => 'required|integer|between:1900,2017',
            'kilometers'   => 'required|integer',
            'image'        => 'bail|required|image|dimensions:min_width=800,min_height=500|max:3000'
        ];
    }
}
