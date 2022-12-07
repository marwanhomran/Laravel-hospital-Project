<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\User;
use http\Encoding\Stream\Debrotli;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{

    public function index(Request $request,Employee $employee)
    {
        $result = $this->getSearch($request,$employee);
        return view('employees.index', [
            'employees' => $result
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

    public function getSearch($request,$employee)
    {

        if ($request) {
            $f = $request->get('first_name');
            $l = $request->get('last_name');
            $s = $request->get('salary');
            $h = $request->get('hire_date');
            $p = $request->get('specialization');
            $d = Department::where('department_name', '=', $request->get('department_name'))->value('id');


            $employee = $employee->when($f, function ($query, $f) {
                $query->where('first_name', 'LIKE', '%' . $f . '%');
            })->when($l, function ($query, $l) {
                $query->where('last_name', 'LIKE', '%' . $l . '%');
            })->when($s, function ($query, $s) {
                $query->where('salary', 'LIKE', '%' . $s . '%');
            })->when($h, function ($query, $h) {
                $query->where('hire_date', 'LIKE', '%' . $h . '%');
            })->when($p, function ($query, $p) {
                $query->where('specialization', 'LIKE', '%' . $p . '%');
            })->when($d, function ($query, $d) {
                $query->where('department_id', '=', $d);
            })->paginate(7);

        } else {
            $employee = $employee->paginate(7);
        }
        return $employee;
    }
//    public function autocomplete(Request $request)
//    {
//
//        $data = [];
//        if($request->has('q')){
//            $a = $request->get('q');
//            $data = Employee::where('first_name', 'LIKE', "%$a%")
//                ->get();
//        }
//
//        return response()->json($data);
//    }
}
