<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Dose;
use App\Models\Medicine;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoseController extends Controller
{
    public function index(Dose $dose)
    {
        return view('doses.index', ['doses' => $dose->all(),
            'doses' => $dose->paginate(7)
        ]);
    }

    public function show(Dose $dose)
    {

        return view('doses.show', ['dose' => $dose]);
    }

    public function create(Medicine $medicine, Patient $patient)
    {

        return view('doses.create', ['medicines' => $medicine->all(), 'patients' => $patient->all()]);
    }

    public function store(Dose $dose, Request $request)
    {
        $request->only(['dose', 'unit', 'dose_time', 'medicine_id', 'patient_name']);
        $ds = $request->all();
        $patientname = DB::table('patients')->where('first_name','=',data_get($ds, 'patient_name'))->value('id');
        $dose::create([
            'dose' => data_get($ds, 'dose'),
            'unit' => data_get($ds, 'unit'),
            'dose_time' => data_get($ds, 'dose_time'),
            'medicine_id' => data_get($ds, 'medicine_id'),
            'patient_id' => $patientname
        ]);

        return redirect()->route('doses.index');
    }

    public function edit(Dose $dose,Medicine $medicines)
    {

        return view('doses.edit', ['dose' => $dose,'medicines'=>$medicines->all()]);

    }


    public function update(Dose $dose, Request $request)
    {
        $request->only(['dose', 'unit', 'dose_time', 'medicine_id', 'patient_id']);
        $ds = $request->all();

        $dose->update([
            'dose' => data_get($ds, 'dose'),
            'unit' => data_get($ds, 'unit'),
            'dose_time' => data_get($ds, 'dose_time'),
            'medicine_id' => data_get($ds, 'medicine_id'),
            'patient_id' => data_get($ds, 'patient_id')
        ]);

        return redirect()->route('doses.index');
    }

    public function destroy(Dose $dose)
    {
        $dose->delete();
        return redirect()->route('doses.index');
    }

}
