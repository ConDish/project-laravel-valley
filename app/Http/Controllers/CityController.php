<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Validator;

class CityController extends Controller
{
    public function index()
    {

        $cities = City::all();

        return response()
            ->json($cities);
    }

    public function show($id)
    {

        $city = City::find($id);

        return response()
            ->json($city);
    }

    // Delete a City
    public function delete($id)
    { 


        $validator = Validator::make([ 'id' => $id], [
            'id' => [
                'required'
            ],
            
        ]);

        if($validator->fails()){

            return response()->json([
                'success' => false
            ]);
        }

        try {

            City::destroy($id);

        }catch(\Exception $e){

            return response()->json([
                'success' => false,
                'error' => 'The doctor have a patient'
            ]);

        }

        return response()
        ->json([
            'success' => true
        ]);

    }

    // Update a Doctor
    public function update()
    {

        $city_update = request()->all();

        $validator = Validator::make(request()->only('id'), [
            'id' => 'required|exists:cities,id',
        ]);

        if($validator->fails()){

            return response()->json([
                'success' => false
            ]);
        }

        City::where('id', $city_update['id'])->update([
            'name' => $city_update['name'],
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    // Create a Patient
    public function create()
    {

        $city_create = request()->all();

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
        ]);


        if ($validator->fails()) {

            return response()->json([
                'success' => false
            ]);
        }

        // Create patient in the data base
        City::create([
            'name' => $city_create['name'],
        ]);



        return response()->json([
            'success' => true
        ]);
    }
}
