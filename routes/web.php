<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\DoseController;
use App\Http\Controllers\VisitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//-------------------------------------------------
Route::resource('employees', EmployeeController::class);
//Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
//Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
//Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
//Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
//Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
//Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
//Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show'); //{employee} url parameter...
////-------------------------------------------------
Route::resource('departments', DepartmentController::class);
//Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
//Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
//Route::post('/department', [DepartmentController::class, 'store'])->name('department.store');
//Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
//Route::put('/departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
//Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
//Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');
//-------------------------------------------------
Route::resource('rooms', RoomController::class);
//-------------------------------------------------
Route::resource('patients', PatientController::class);
//-------------------------------------------------
Route::resource('bills', BillController::class);
//-------------------------------------------------
Route::resource('medicines', MedicineController::class);
//-------------------------------------------------
Route::resource('doses', DoseController::class);
//-------------------------------------------------
Route::resource('visits', VisitController::class);


