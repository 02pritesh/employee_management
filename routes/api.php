<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\AttandanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\LeaveapplicationController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//-------admin data-------//
Route::post('register',[AdminController::class,'register']);
Route::post('register_update',[AdminController::class,'register_update']);
Route::post('register_del',[AdminController::class,'register_del']);

Route::post('event_add',[AdminController::class,'Event']);
Route::post('event_update',[AdminController::class,'Event_update']);
Route::post('event_del',[AdminController::class,'event_del']);

Route::post('notification',[AdminController::class,'notification']);
Route::post('approve',[AdminController::class,'approve']);

Route::post('attan_update',[AdminController::class,'status_update']);
Route::get('leave_get',[AdminController::class,'Leave']);
Route::post('active',[AdminController::class,'active']);
Route::post('holiday',[AdminController::class,'holiday']);

//----login page reset forget page=-----//


Route::post('/login',[LoginController::class,'login_user']);
Route::post('/reset_pass',[LoginController::class,'resetPass']);
Route::get('/register_user',[LoginController::class,'register_user']);

//----user status-----//
Route::post('/attandance',[AttandanceController::class,'Attandance']);
Route::post('/status_at',[AttandanceController::class,'status_attan']);
Route::post('/salary',[AttandanceController::class,'salary']);

//---- profile update-//
Route::post('profile',[DashboardController::class,'profile_up']);
Route::post('profile_up',[DashboardController::class,'profile_img']);

//-------event------//
Route::get('events',[EventsController::class,'Event_user']);

//---->notification page -----//
Route::get('getnotice',[EventsController::class,'get_notice']);
Route::post('notice_del',[EventsController::class,'notice_del']);


//-----leave-------//
Route::post('leave',[LeaveapplicationController::class,'Leave_app']);
Route::post('approve_status',[LeaveapplicationController::class,'approve_app']);
