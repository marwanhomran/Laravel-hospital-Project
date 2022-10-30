<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(Medicine $medicine)
    {
        return view('medicines.index', ['medicines' => $medicine->all(),
            'medicines' => $medicine->paginate(7)
        ]);
    }

    public function show(Medicine $medicine)
    {

        return view('medicines.show', ['medicine' => $medicine]);
    }

    public function create()
    {
        return view('medicines.create');
    }

    public function store(Medicine $medicine, Request $request)
    {
        $request->only(['medicine_name']);
        $mid = $request->all(); //get all the field by it names from the form...

        $medicine::create([
            'medicine_name' => data_get($mid, 'medicine_name'),
        ]);

        return redirect()->route('medicines.index');
    }

    public function edit(Medicine $medicine)
    {

        return view('medicines.edit', ['medicine' => $medicine]);

    }


    public function update(Medicine $medicine, Request $request)
    {
        $request->only(['medicine_name']);
        $mid = $request->all();
        $medicine->update([
            'medicine_name' => data_get($mid, 'medicine_name'),
        ]);

        return redirect()->route('medicines.index');

    }


    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicines.index');
    }
}
