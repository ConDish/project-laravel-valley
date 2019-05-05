<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Validator;
use League\Flysystem\Exception;

class DoctorController extends Controller
{
    public function index()
    {

        $doctors = Doctor::all();

        return response()
            ->json($doctors);
    }

    public function show($id)
    {

        $doctor = Doctor::find($id);

        return response()
            ->json($doctor);
    }

    // Delete a Doctor
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

            Doctor::destroy($id);

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

        $doctor_update = request()->all();

        $validator = Validator::make(request()->only('id'), [
            'id' => 'required|exists:doctors,id',
        ]);

        if($validator->fails()){

            return response()->json([
                'success' => false
            ]);
        }

        Doctor::where('id', $doctor_update['id'])->update([
            'name' => $doctor_update['name'],
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    // Create a Patient
    public function create()
    {

        $doctor_create = request()->all();

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
        ]);


        if ($validator->fails()) {

            return response()->json([
                'success' => false
            ]);
        }

        // Create patient in the data base
        Doctor::create([
            'name' => $doctor_create['name'],
        ]);



        return response()->json([
            'success' => true
        ]);
    }
}
