<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Homepage\DashboardHrisController;
use App\Http\Controllers\Master\SiteHrisController;
use App\Http\Controllers\Master\DepartmentHrisController;
use App\Http\Controllers\Master\PositionHrisController;
use App\Http\Controllers\Master\EmailReceiverHrisController;
use App\Http\Controllers\Forms\EmployeeHrisController;
use App\Http\Controllers\Email\ContractController;


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
// Route::get('view', function () {
//     return view('view', ['title' => '']);
// })->name('view');
Route::get('/', function () {
    return view('login', ['title' => '']);
})->name('login');
Route::get('login', [UserController::class, 'login_action'])->name('login.action');
Route::post('login', [UserController::class, 'login_action'])->name('login.action');
Route::get('register',[UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::get('users',[UserController::class, 'users'])->name('users')->middleware('auth');
Route::post('users', [UserController::class, 'users_add'])->name('users.add')->middleware('auth');
Route::get('users/json', [UserController::class, 'users_data'])->name('users.data')->middleware('auth');
Route::get('users/reset/{id}', [UserController::class, 'users_reset'])->name('users.reset');

Route::get('profile',[UserController::class, 'profile'])->name('profile')->middleware('auth');
Route::post('profile', [UserController::class, 'profile_edit'])->name('profile.edit')->middleware('auth');

Route::get('dashboard', [DashboardHrisController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('dashboard/json', [DashboardHrisController::class, 'employee_data'])->name('dashboard.data')->middleware('auth');

// Master HRIS
Route::get('siteHris',[SiteHrisController::class, 'site_browse'])->name('siteHris')->middleware('auth');
Route::post('siteHris', [SiteHrisController::class, 'site_add'])->name('siteHris.add')->middleware('auth');

Route::get('departmentHris',[DepartmentHrisController::class, 'department_browse'])->name('departmentHris')->middleware('auth');
Route::post('departmentHris', [DepartmentHrisController::class, 'department_add'])->name('departmentHris.add')->middleware('auth');

Route::get('positionHris',[PositionHrisController::class, 'position_browse'])->name('positionHris')->middleware('auth');
Route::post('positionHris', [PositionHrisController::class, 'position_add'])->name('positionHris.add')->middleware('auth');

Route::get('emailReceiverHris',[EmailReceiverHrisController::class, 'emailReceiver_browse'])->name('emailReceiverHris')->middleware('auth');
Route::post('emailReceiverHris', [EmailReceiverHrisController::class, 'emailReceiver_add'])->name('emailReceiverHris.add')->middleware('auth');
Route::post('emailReceiverHris/edit', [EmailReceiverHrisController::class, 'emailReceiver_edit'])->name('emailReceiverHris.edit')->middleware('auth');

// Forms
Route::get('employeeHris',[EmployeeHrisController::class, 'employee'])->name('employeeHris')->middleware('auth');
Route::get('employeeHris_add',[EmployeeHrisController::class, 'employee_add'])->name('employeeHris_add')->middleware('auth');
Route::post('employeeHris', [EmployeeHrisController::class, 'employee_save'])->name('employeeHris.save')->middleware('auth');
Route::get('employeeHris/json', [EmployeeHrisController::class, 'employee_data'])->name('employeeHris.data')->middleware('auth');
Route::get('employeeHris/detail/{nik}', [EmployeeHrisController::class, 'employee_detail'])->name('employeeHris.detail');
Route::get('employeeHris/edit/{id}', [EmployeeHrisController::class, 'employee_edit'])->name('employeeHris.edit');
Route::put('employeeHris/update/{id}', [EmployeeHrisController::class, 'employee_update'])->name('employeeHris.update');
Route::post('employeeHris/emp_renewal', [EmployeeHrisController::class, 'employee_emp_renewal'])->name('employeeHris.emp_renewal')->middleware('auth');
Route::post('employeeHris/emp_del', [EmployeeHrisController::class, 'employee_emp_del'])->name('employeeHris.emp_del')->middleware('auth');

//Emails
Route::get('/send-expired-contracts-email', [ContractController::class, 'sendExpiredContractsEmail']);



Route::get('password', [UserController::class, 'password'])->name('password');
Route::post('password', [UserController::class, 'password_action'])->name('password.action');
Route::get('logout', [UserController::class, 'logout'])->name('logout');
