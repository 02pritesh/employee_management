<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\admin\FunctionController;
use App\Http\Controllers\admin\TestAttendenceController;
use App\Http\Controllers\admin\TestSalaryController;
use App\Http\Controllers\admin\ApplicationController;
use App\Http\Controllers\admin\SalaryController;
use App\Http\Controllers\admin\ProjectTaskController;
use App\Http\Controllers\admin\ModuleController;
use App\Http\Controllers\user\EmployeeController;
use App\Http\Controllers\user\AttandanceController;
use App\Http\Controllers\user\LeaveController;

// App\Http\Controllers\DashboardController ;
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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::group(['Middleware' => ['auth', 'varified']], function () {
});

Route::get('/', [LoginController::class, 'login']);
Route::post('/login', [LoginController::class, 'login_user']);
Route::get('logout', [LoginController::class, 'logout']);
Route::get('password', [LoginController::class, 'password']);
Route::post('forget_password', [LoginController::class, 'forgetpass']);
Route::get('reset-password', [LoginController::class, 'resetPassword']);

Route::post('reset-password', [LoginController::class, 'reset_password']);

Route::post('forgetpassword', [LoginController::class, 'forget_password']);

Route::get('reset_pass/{id}', [LoginController::class, 'reset']);
Route::post('reset_pass', [LoginController::class, 'resetPass']);

/////admin dashboard-----//
// Route::get('Dashboard',[AdminController::class,'dashboard']);
Route::get('employee', [AdminController::class, 'employee']);
Route::get('adminuser', [AdminController::class, 'Admin_user']);
Route::get('status/{id}', [AdminController::class, 'status']);
Route::get('register', [AdminController::class, 'register_userr']);
Route::post('register', [AdminController::class, 'register_user']);
Route::post('register_update', [AdminController::class, 'register_update']);
Route::get('register_update/{id}', [AdminController::class, 'register_up']);
Route::get('delete/{id}', [AdminController::class, 'deleteStudent']);
Route::get('update/{id}', [ApplicationController::class, 'update']);
Route::post('update', [ApplicationController::class, 'update_status']);
Route::get('holidays', [AdminController::class, 'holidays']);
Route::post('holiday', [AdminController::class, 'holiday_add']);
Route::get('holiday_delete/{id}', [AdminController::class, 'holiday_del']);
Route::get('holiday_update/{id}', [AdminController::class, 'holiday_update']);
Route::post('holiday_update', [AdminController::class, 'holiday_up']);
Route::get('salary/{id}', [SalaryController::class, 'salary']);
Route::post('salary', [SalaryController::class, 'salary_add']);

Route::get('emp_salary', [SalaryController::class, 'emp_salary']);
Route::get('function', [FunctionController::class, 'Event_admin']);
Route::post('events', [FunctionController::class, 'Event']);
Route::get('event_update/{id}', [FunctionController::class, 'event_update']);
Route::post('event_update', [FunctionController::class, 'Event_up']);
Route::get('deleted/{id}', [FunctionController::class, 'delete']);
Route::get('noti_del/{id}', [FunctionController::class, 'delete_del']);
Route::get('notification_edit/{id}', [FunctionController::class, 'notification_edit']);
Route::post('notification_edit', [FunctionController::class, 'notification_up']);

Route::get('Profile/{id}', [AdminController::class, 'profile']);
Route::post('Profile-data', [AdminController::class, 'profile_up']);
Route::get('Notification', [FunctionController::class, 'notification']);
Route::post('notification', [FunctionController::class, 'notice']);
Route::post('notifi_del', [FunctionController::class, 'notice_del']);
Route::get('leave-application', [ApplicationController::class, 'Leave']);
Route::post('Profile-data', [AdminController::class, 'profile_up']);
Route::get('/user-attendence/{user_id}', [TestAttendenceController::class, 'userAttendence']);
Route::get('attandence/{month}/{user_id}', [TestAttendenceController::class, 'attandence']);
Route::post('attandence', [TestAttendenceController::class, 'Attandance_user']);

Route::post('/monthly_salary', [TestAttendenceController::class, 'calculateSalary']);
Route::get('/monthly_salary/{user_id}/{month}', [TestAttendenceController::class, 'calculate_Salary']);
Route::post('/incentive-update', [TestSalaryController::class, 'incentive']);
Route::get('month-attendence/{user_id}', [TestAttendenceController::class, 'store_us']);

////user data-->->->->->->-//
Route::get('Userprofile', [EmployeeController::class, 'Userprofile']);
Route::get('dashboard', [EmployeeController::class, 'dashboard']);
Route::get('profile/{id}', [EmployeeController::class, 'profile_update']);
Route::post('profile-update', [EmployeeController::class, 'profile_up']);
Route::get('salary', [EmployeeController::class, 'salary']);
Route::get('attandence', [AttandanceController::class, 'attandence']);
Route::post('attandence', [AttandanceController::class, 'attandence_submit']);
Route::get('attandence_show', [AttandanceController::class, 'attandence_show']);
Route::get('/test-data/{user_id}/{month}', [AttandanceController::class, 'test_data']);
Route::post('store', [AttandanceController::class, 'store_us']);
Route::get('event', [LeaveController::class, 'event_user']);
Route::get('leave', [LeaveController::class, 'leave']);
Route::post('leave_page', [LeaveController::class, 'leave_app']);
Route::get('holiday', [LeaveController::class, 'holiday']);
Route::get('notification', [LeaveController::class, 'notification']);
Route::get('notification_delete/{id}', [LeaveController::class, 'notification_delete']);



// Module 3 Project task

Route::get('add-project', [ProjectTaskController::class, 'add_project']);
Route::post('add-project-detail', [ProjectTaskController::class, 'add_project_detail']);

// this route show project informtaion in the form of table

Route::get('project-info', [ProjectTaskController::class, 'project_information']);
Route::post('project-info', [ProjectTaskController::class, 'project_status']);
Route::get('project-info/module/{id}', [ModuleController::class, 'module']);


//this route for add employee in given project

// Route::get('add-employee/project',[AdminController::class,'employee']);
Route::get('asign-project', [ProjectTaskController::class, 'asign_project']);
Route::post('asign-project', [ProjectTaskController::class, 'asign_project_employee']);


//this route show asign project details
Route::get('asign-project-detail', [ProjectTaskController::class, 'asign_project_detail']);
Route::get('edit-asign-project-detail/{id}', [ProjectTaskController::class, 'edit_asign_project_detail']);
Route::post('edit-asign-project-detail', [ProjectTaskController::class, 'update_asign_project_detail']);
Route::get('delete-asign-project-detail/{id}', [ProjectTaskController::class, 'delete_asign_project_detail']);




//This route delete and edit project information 
Route::get('project-info-edit/{id}', [ProjectTaskController::class, 'project_info_edit']);
Route::post('project-info-update', [ProjectTaskController::class, 'project_info_update']);
Route::get('project-info-delete/{id}', [ProjectTaskController::class, 'project_info_delete']);

Route::get('view-project-employee/{id}', [ProjectTaskController::class, 'view_project_employee']);

//  Route::get('project-payment/{id}',[ProjectTaskController::class,'project_payment']);
Route::post('project-payment', [ProjectTaskController::class, 'add_project_payment']);


Route::get('module/project-payment/{id}', [ModuleController::class, 'project_payment']);
Route::post('module-update', [ModuleController::class, 'module_update']);

// Route::get('edit-module/{id}',[ModuleController::class,'edit_module']);


//this route for create a form for employee_developer 

//  Route::get('add-employee-developer',[ProjectTaskController::class,'add_employee_developer']);
//  Route::post('add-employee-developer',[ProjectTaskController::class,'add_employee_developer_detail']);

//  Route::get('employee-developer-detail',[ProjectTaskController::class,'employee_developer_detail']);
//  Route::get('edit-employee-developer-detail/{id}',[ProjectTaskController::class,'edit_employee_developer_detail']);
//  Route::post('edit-employee-developer-detail',[ProjectTaskController::class,'udate_employee_developer_detail']);
//  Route::get('delete-employee-developer-detail/{id}',[ProjectTaskController::class,'delete_employee_developer_detail']);
