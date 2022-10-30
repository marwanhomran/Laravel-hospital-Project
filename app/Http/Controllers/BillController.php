<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function index(Bill $bill)
    {
        return view('bills.index', ['bills' => $bill->all(),
            'bills' => $bill->paginate(7)
        ]);
    }

    public function show(Bill $bill)
    {

        return view('bills.show', ['bill' => $bill]);
    }

    public function create()
    {

        return view('bills.create');
    }

    public function store(Bill $bill, Request $request)
    {
        $request->only(['print_date', 'pay_date', 'amount', 'status', 'employee_name', 'room_number', 'patient_name']);
        $bll = $request->all();
//        $employeeid2 = Employee::query()->where('first_name', '=', data_get($bll, 'employee_name'))->value();
//        dd($employeeid2);
        $employeeid = DB::table('employees')->where('first_name', '=', data_get($bll, 'employee_name'))->value('id');
        $roomnumber = DB::table('rooms')->where('id', '=', data_get($bll, 'room_number'))->value('id');
        $patientid  = DB::table('patients')->where('first_name', '=', data_get($bll, 'patient_name'))->value('id');
        $bill::create([
            'print_date' => data_get($bll, 'print_date'),
            'pay_date' => data_get($bll, 'pay_date'),
            'amount' => data_get($bll, 'amount'),
            'visit_id' => DB::table('visits')->where('employee_id', '=', $employeeid)
                ->where('room_id', '=', $roomnumber)
                ->where('patient_id', '=', $patientid)->value('id'),
            'status' => data_get($bll, 'status'),

        ]);

        return redirect()->route('bills.index');
    }

    public function edit(Bill $bill)
    {

        return view('bills.edit', ['bill' => $bill]);

    }

    public function update(Bill $bill, Request $request)
    {
        $request->only(['print_date', 'pay_date', 'amount', 'status']);
        $bll = $request->all();

        $bill->update([
            'print_date' => data_get($bll, 'print_date'),
            'pay_date' => data_get($bll, 'pay_date'),
            'amount' => data_get($bll, 'amount'),
            'status' => data_get($bll, 'status'),

        ]);

        return redirect()->route('bills.index');
    }


    public function destroy(Bill $bill)
    {
        $bill->delete();
        return redirect()->route('bills.index');
    }
}
