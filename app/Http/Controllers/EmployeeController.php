<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index(Employee $employee)
    {
        return view('employees.index', ['employees' => $employee->all(),
            'employees' => $employee->paginate(7)
        ]);
    }

    public function show(Employee $employee)
    {

        return view('employees.show', ['employee' => $employee]);
    }

    public function create(Department $departments)
    {

        return view('employees.create', ['departments' => $departments->all()]);
    }

    public function store(Employee $employee, Request $request)
    {
        $request->only(['first_name', 'last_name', 'salary', 'hire_date', 'specialization', 'description', 'department_id']);
        $employer = $request->all(); //get all the field by it names from the form...

        $employee::create([
            'first_name' => data_get($employer, 'first_name'),
            'last_name' => data_get($employer, 'last_name'),
            'salary' => data_get($employer, 'salary'),
            'hire_date' => data_get($employer, 'hire_date'),
            'specialization' => data_get($employer, 'specialization'),
            'description' => data_get($employer, 'description'),
            'department_id' => data_get($employer, 'department_id'),
        ]);

        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee, Department $departments)
    {

        return view('employees.edit', ['employee' => $employee, 'departments' => $departments->all()]);

    }

    public function update(Employee $employee, Request $request)
    {
        $request->only(['first_name', 'last_name', 'salary', 'hire_date', 'specialization', 'description', 'department_id']);
        $employer = $request->all();
        $employee->update([
            'first_name' => data_get($employer, 'first_name'),
            'last_name' => data_get($employer, 'last_name'),
            'salary' => data_get($employer, 'salary'),
            'hire_date' => data_get($employer, 'hire_date'),
            'specialization' => data_get($employer, 'specialization'),
            'description' => data_get($employer, 'description'),
            'department_id' => data_get($employer, 'department_id'),
        ]);

        return redirect()->route('employees.index');

    }

    public function destroy(Employee $employee)
    {

        $employee->delete();
        return redirect()->route('employees.index');
    }

}
