<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Department $department)
    {

        return view('departments.index', [
            'departments' => $department->paginate(7)
            ]);
    }

    public function show(Department $department)
    {

        return view('departments.show', ['department' => $department]);
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Department $department, Request $request)
    {
        $request->only(['department_name','description']);
        $depart = $request->all(); //get all the field by it names from the form...

        $department::create([
            'department_name' => data_get($depart, 'department_name'),
            'description' => data_get($depart, 'description'),

        ]);

        return redirect()->route('departments.index');
    }

    public function edit(Department $department)
    {

        return view('departments.edit', ['department' => $department]);

    }

    public function update(Department $department, Request $request)
    {
        $request->only(['department_name','description']);
        $depart = $request->all();
        $department->update([
            'department_name' => data_get($depart, 'department_name'),
            'description' => data_get($depart, 'description'),

        ]);

        return redirect()->route('departments.index');

    }


    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index');
    }
}
