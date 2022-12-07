<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Patient;
use App\Models\Room;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index(Visit $visit)
    {
        return view('visits.index', [
            'visits' => $visit->paginate(7)
        ]);
    }

    public function show(Visit $visit)
    {

        return view('visits.show', ['visit' => $visit]);
    }

    public function create(Patient $patients, Room $rooms, Employee $employees)
    {
        return view('visits.create',[
            'patients'=>$patients->all(),
            'rooms'=>$rooms->all(),
            'employees'=>$employees->all(),
        ]);
    }

    public function store(Visit $visit, Request $request)
    {
        $request->only(['entrance_date', 'status', 'patient_id', 'room_id', 'employee_id']);
        $vst = $request->all(); //get all the field by it names from the form...

        $visit::create([
            'entrance_date' => data_get($vst, 'entrance_date'),
            'status' => data_get($vst, 'status'),
            'patient_id' => data_get($vst, 'patient_id'),
            'room_id' => data_get($vst, 'room_id'),
            'employee_id' => data_get($vst, 'employee_id'),
        ]);

        return redirect()->route('visits.index');
    }

    public function edit(Visit $visit)
    {

        return view('visits.edit', ['visit' => $visit]);

    }

    public function update(Visit $visit, Request $request)
    {
        $request->only(['entrance_date', 'status', 'patient_name', 'room_number', 'employee_name']);
        $vst = $request->all(); //get all the field by it names from the form...

        $visit->update([
            'entrance_date' => data_get($vst, 'entrance_date'),
            'status' => data_get($vst, 'status'),
            'patient_id' => Patient::query()->where('first_name', '=', data_get($vst, 'patient_name'))->value('id'),
            'room_id' => Room::query()->where('id', '=', data_get($vst, 'room_number'))->value('id'),
            'employee_id' => Employee::query()->where('first_name', '=', data_get($vst, 'employee_name'))->value('id'),
        ]);

        return redirect()->route('visits.index');
    }

    public function destroy(Visit $visit)
    {
        $visit->delete();
        return redirect()->route('visits.index');
    }

}
