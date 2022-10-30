<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Patient $patient)
    {
        return view('patients.index', ['patients' => $patient->all(),
            'patients' => $patient->paginate(7)
        ]);
    }


    public function show(Patient $patient)
    {

        return view('patients.show', ['patient' => $patient]);
    }

    public function create()
    {

        return view('patients.create');
    }

    public function store(Patient $patient, Request $request)
    {
        $request->only(['first_name', 'last_name', 'phone', 'gender', 'age', 'address']);
        $pat = $request->all(); //get all the field by it names from the form...

        $patient::create([
            'first_name' => data_get($pat, 'first_name'),
            'last_name' => data_get($pat, 'last_name'),
            'phone' => data_get($pat, 'phone'),
            'gender' => data_get($pat, 'gender'),
            'age' => data_get($pat, 'age'),
            'address' => data_get($pat, 'address'),
        ]);

        return redirect()->route('patients.index');
    }

    public function edit(Patient $patient)
    {

        return view('patients.edit', ['patient' => $patient,'patients'=>$patient->all()]);

    }

    public function update(Patient $patient, Request $request)
    {
        $request->only(['first_name', 'last_name', 'phone', 'gender', 'age', 'address']);
        $pat = $request->all();
        $patient->update([
            'first_name' => data_get($pat, 'first_name'),
            'last_name' => data_get($pat, 'last_name'),
            'phone' => data_get($pat, 'phone'),
            'gender' => data_get($pat, 'gender'),
            'age' => data_get($pat, 'age'),
            'address' => data_get($pat, 'address'),

        ]);

        return redirect()->route('patients.index');

    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index');
    }
}
