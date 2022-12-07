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
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ForgotPasswordController;

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
    return view('sessions.create');
})->middleware('guest');
//-------------------------------------------------
Route::get('/home', function () {
    return view('welcome');
})->middleware('auth');
//-------------------------------------------------
Route::resource('employees', EmployeeController::class)->middleware('auth');
//Route::get('autocomplete', [EmployeeController::class, 'autocomplete'])->name('autocomplete');
//Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
//Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
//Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
//Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
//Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
//Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
//Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show'); //{employee} url parameter...
//-------------------------------------------------
Route::resource('departments', DepartmentController::class)->middleware('auth');
//Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
//Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
//Route::post('/department', [DepartmentController::class, 'store'])->name('department.store');
//Route::get('/departments/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
//Route::put('/departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
//Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
//Route::get('/departments/{department}', [DepartmentController::class, 'show'])->name('departments.show');
//-------------------------------------------------
Route::resource('rooms', RoomController::class)->middleware('auth');
//-------------------------------------------------
Route::resource('patients', PatientController::class)->middleware('auth');
//-------------------------------------------------
Route::resource('bills', BillController::class)->middleware('auth');
//-------------------------------------------------
Route::resource('medicines', MedicineController::class)->middleware('auth');
//-------------------------------------------------
Route::resource('doses', DoseController::class)->middleware('auth');
//-------------------------------------------------
Route::resource('visits', VisitController::class)->middleware('auth');
//-------------------------------------------------
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
//-------------------------------------------------
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout',[SessionController::class, 'destroy'])->middleware('auth');
//-------------------------------------------------
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->middleware('guest');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->middleware('guest');
Route::get('password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('reset-password-form');
Route::post('password/reset', [ForgotPasswordController::class, 'resetPassword']);

//-------------------------------------------------
Route::resource('posts', PostController::class)->middleware('auth');



