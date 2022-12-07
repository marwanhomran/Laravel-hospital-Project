<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function index(Bill $bill)
    {
        return view('bills.index', [
            'bills' => $bill->paginate(7)
        ]);
    }

    public function show(Bill $bill)
    {

        return view('bills.show', ['bill' => $bill]);
    }

    public function create(Employee $employees, Patient $patients,Room $rooms)
    {

        return view('bills.create', [
            'employees' => $employees->all(),
            'patients' => $patients->all(),
            'rooms' => $rooms->all()
        ]);
    }

    public function store(Bill $bill, Request $request)
    {
        $request->only(['print_date', 'pay_date', 'amount', 'status', 'employee_id', 'room_id', 'patient_id']);
        $bll = $request->all();
        $bill::create([
            'print_date' => data_get($bll, 'print_date'),
            'pay_date' => data_get($bll, 'pay_date'),
            'amount' => data_get($bll, 'amount'),
            'visit_id' => DB::table('visits')->where('employee_id', '=', data_get($bll, 'employee_id'))
                ->where('room_id', '=', data_get($bll, 'room_id'))
                ->where('patient_id', '=', data_get($bll, 'patient_id'))->value('id'),
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
