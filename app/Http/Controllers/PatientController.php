<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use Validator;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function index()
    {

        $patients = Patient::all();

        return response()
            ->json($patients);
    }

    public function show($id)
    {

        $patient = Patient::find($id);

        return response()
            ->json($patient);
    }

    // Delete a Patient
    public function delete($id)
    { 


        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:patients,id'
        ]);

        if($validator->fails()){

            return response()->json([
                'success' => false
            ]);
        }

        Patient::destroy($id);

        return response()
        ->json([
            'success' => true
        ]);

    }

    // Update a Patient
    public function update()
    {

        $patient_update = request()->all();


        $validator = Validator::make(request()->all(), [
            'id' => 'required|exists:patients,id',
            'email' => [
                Rule::unique('patients')->ignore($patient_update['id']),
            ],
            'city_id' => 'exists:cities,id',
            'doctor_id' => 'exists:doctors,id'

        ]);

        if($validator->fails()){

            return response()->json([
                'success' => false
            ]);
        }

        Patient::where('id', $patient_update['id'])->update([
            'name' => $patient_update['name'],
            'email' => $patient_update['email'],
            'doctor_id' => $patient_update['doctor_id'],
            'city_id' => $patient_update['city_id']
        ]);



        return response()->json([
            'success' => true
        ]);
    }

    // Create a Patient
    public function create()
    {

        $patient_create = request()->all();

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|unique:patients',
            'password' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
            'city_id' => 'required|exists:cities,id'
        ]);


        if ($validator->fails()) {

            return response()->json([
                'success' => false
            ]);
        }

        // Create patient in the data base
        Patient::create([
            'name' => $patient_create['name'],
            'email' => $patient_create['email'],
            'password' => bcrypt($patient_create['password']),
            'doctor_id' => $patient_create['doctor_id'],
            'city_id' => $patient_create['city_id']

        ]);



        return response()->json([
            'success' => true
        ]);
    }
}
