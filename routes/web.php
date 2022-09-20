<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TimeTrackerController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;


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
/*
Route::get('/', function () {
    return view('index');
});*/

Route::get('/', [ViewController::class,'index'])->name('dashboard');

// Route::get('employee_details', function () {
//     return view('employee_details');
// })->name('employee_details');

Route::group(['middleware'=>'auth','prefix' =>'dashboard'], function () {
    // Route::get('/', [ViewController::class,'index'])->name('dashboard');
    Route::get('/', [ViewController::class,'index'])->name('dashboard');
    Route::get('admin-page', [AdminController::class,'index'])->name('admin_page');
    Route::get('all-employees', [ViewController::class,'view_all_employees'])->name('view_all_employees');
    Route::get('view-employee-profile/{id}',[ViewController::class,'view_employee_profile'])->name('view_employee_profile');
    Route::get('all-time-trackers', [ViewController::class,'view_all_time_trackers'])->name('view_all_time_trackers');
    Route::get('all-tasks', [ViewController::class,'view_all_tasks'])->name('view_all_tasks');
    Route::get('all-clients', [ViewController::class,'view_all_clients'])->name('view_all_clients');
    Route::get('all-projects', [ViewController::class,'view_all_projects'])->name('view_all_projects');
    Route::get('all-users', [ViewController::class,'view_all_users'])->name('view_all_users');

    Route::get('all-time-trackers-report', [ViewController::class,'view_all_time_trackers_report'])->name('view_all_time_trackers_report');
    Route::get('view-user-profile', [ViewController::class,'view_user_profile'])->name('view_user_profile');

    //Employee Routes 
    Route::post('profile_document_add',[EmployeeController::class,'profile_document_add'])->name('profile_document_add');
    Route::get('single_profile_document_delete/{id}',[EmployeeController::class,'single_profile_document_delete'])->name('single_profile_document_delete');

    Route::get('create-employee-profile',[EmployeeController::class,'create_employee_profile'])->name('create_employee_profile');
    Route::get('edit-employee-profile/{id}',[EmployeeController::class,'edit_employee_profile'])->name('edit_employee_profile');
    Route::get('delete-employee-profile/{id}',[EmployeeController::class,'delete_employee_profile'])->name('delete_employee_profile');
    Route::post('store-profile-data',[EmployeeController::class,'store_profile_data'])->name('store_profile_data');
    Route::get('get-single-employee/{id}',[EmployeeController::class,'get_single_employee'])->name('api_single_employee');

    //Admin Routes
    Route::get('add-job-role',[AdminController::class,'add_job_role'])->name('add_job_role');
    Route::post('store-job-role',[AdminController::class,'store_job_role'])->name('store_job_role');
    Route::get('add-work-location',[AdminController::class,'add_work_location'])->name('add_work_location');
    Route::post('store-work-location',[AdminController::class,'store_work_location'])->name('store_work_location');

    // Route::post('add-profile',[DashboardController::class,'store_profile_data'])->name('user_profile_add');
    
    //Time Tracker Routes
    Route::get('time_tracker_delete/{id}',[TimeTrackerController::class,'delete_single_time_tracker'])->name('single_time_tracker_delete');
    Route::post('time_tracker_start',[TimeTrackerController::class,'time_tracker_start'])->name('time_tracker_start');
    Route::post('time_tracker_stop',[TimeTrackerController::class,'time_tracker_stop'])->name('time_tracker_stop');
    Route::post('time_tracker_report_filter',[TimeTrackerController::class,'time_tracker_report_filter'])->name('time_tracker_report_filter');

    //Task Routes
    Route::post('create-task',[TaskController::class,'create_task'])->name('create_task');
    Route::get('task_delete/{id}',[TaskController::class,'delete_single_task'])->name('single_task_delete');
    Route::post('task_start',[TaskController::class,'task_start'])->name('task_start');
    Route::post('task_stop',[TaskController::class,'task_stop'])->name('task_stop');
    Route::post('task_complete',[TaskController::class,'task_complete'])->name('task_complete');
    Route::post('task_cancel',[TaskController::class,'task_cancel'])->name('task_cancel');

    //Client Routes
    Route::get('create-client',[ClientController::class,'create_client'])->name('create_client');
    Route::get('edit-client/{id}',[ClientController::class,'edit_client'])->name('edit_client');
    Route::get('delete-client/{id}',[ClientController::class,'delete_client'])->name('delete_client');
    Route::post('store-client-data',[ClientController::class,'store_client_data'])->name('store_client_data');

    //Project Routes
    Route::get('create-project',[ProjectController::class,'create_project'])->name('create_project');
    Route::post('store-project-data',[ProjectController::class,'store_project_data'])->name('store_project_data');
    Route::get('edit-project/{id}',[ProjectController::class,'edit_project'])->name('edit_project');
    Route::get('delete-project/{id}',[ProjectController::class,'delete_project'])->name('delete_project');
    Route::post('project_start',[ProjectController::class,'project_start'])->name('project_start');
    Route::post('project_hold',[ProjectController::class,'project_hold'])->name('project_hold');
    Route::post('project_complete',[ProjectController::class,'project_complete'])->name('project_complete');
    Route::post('project_cancel',[ProjectController::class,'project_cancel'])->name('project_cancel');
    Route::get('project_details/{id}',[ProjectController::class,'get_project_details'])->name('project_details');

    Route::get('project_comment_delete/{id}',[ProjectController::class,'delete_single_project_comment'])->name('single_project_comment_delete');
    Route::post('add-project-comment',[ProjectController::class,'store_project_comment_data'])->name('project_comment_add');

    Route::get('get_calender/{id}',[ProjectController::class,'get_calender'])->name('get_calender');
    Route::post('action_calender',[ProjectController::class,'action_calender'])->name('action_calender');
    Route::get('project_event_delete/{id}',[ProjectController::class,'delete_single_project_event'])->name('single_project_event_delete');

    //User
    Route::post('change_password-user',[UserController::class,'change_password_user_data'])->name('user_change_password');
    Route::post('change-password-from-user-profile',[UserController::class,'change_password_from_user_profile'])->name('change_password_from_user_profile');
    Route::get('delete-user/{id}',[UserController::class,'delete_user'])->name('delete_user');
    Route::get('create-user',[UserController::class,'create_user'])->name('create_user');
    Route::post('store-user-data',[UserController::class,'store_user_data'])->name('store_user_data');
    Route::get('edit-user/{id}',[UserController::class,'edit_user'])->name('edit_user');

});

// Route::group(['middleware'=>'auth', 'prefix' => 'dashboard'], function () {
// 	Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//     Route::post('add-profile',[DashboardController::class, 'store_profile_data'])->name('user_profile_add');
//     Route::post('update-profile',[DashboardController::class, 'update_profile_data'])->name('user_profile_update');
//     Route::get('employee', [DashboardController::class, 'get_all_employees'])->name('all_employees');
//     Route::get('profile', [DashboardController::class, 'profile'])->name('profile');
//     Route::get('get-single-employee/{id}',[DashboardController::class, 'get_single_employee'])->name('api_single_employee');
//     Route::get('profile_edit/{id}',[DashboardController::class, 'get_single_profile'])->name('single_profile_edit');
//     Route::get('profile_delete/{id}',[DashboardController::class, 'delete_single_profile'])->name('single_profile_delete');

//     Route::get('user', [DashboardController::class, 'get_users'])->name('all_users');
//     Route::post('add-user',[DashboardController::class, 'store_user_data'])->name('user_add');
//     Route::post('update-user',[DashboardController::class, 'update_user_data'])->name('user_update');
//     Route::get('user_delete/{id}',[DashboardController::class, 'delete_single_user'])->name('single_user_delete');
//     Route::get('user_edit/{id}',[DashboardController::class, 'get_single_user'])->name('single_user_edit');
//     Route::post('change_password-user',[DashboardController::class, 'change_password_user_data'])->name('user_change_password');

//     Route::get('time_tracker', [DashboardController::class, 'get_time_tracker'])->name('time_tracker');
//     Route::get('single_time_tracker', [DashboardController::class, 'get_time_tracker'])->name('time_tracker');
//     Route::get('time_tracker_delete/{id}',[DashboardController::class, 'delete_single_time_tracker'])->name('single_time_tracker_delete');
    
//     Route::post('time_start',[DashboardController::class, 'time_start'])->name('time_start');
//     Route::post('time_stop',[DashboardController::class, 'time_stop'])->name('time_stop');

//     Route::get('task', [DashboardController::class, 'get_tasks'])->name('all_tasks');
//     Route::post('add-task',[DashboardController::class, 'store_task_data'])->name('task_add');
//     Route::get('task_delete/{id}',[DashboardController::class, 'delete_single_task'])->name('single_task_delete');
//     // Route::get('get-single-task/{id}',[DashboardController::class, 'get_single_task'])->name('api_single_task');

//     Route::post('task_start',[DashboardController::class, 'task_start'])->name('task_start');
//     Route::post('task_stop',[DashboardController::class, 'task_stop'])->name('task_stop');
//     Route::post('task_complete',[DashboardController::class, 'task_complete'])->name('task_complete');
//     Route::post('task_cancel',[DashboardController::class, 'task_cancel'])->name('task_cancel');

//     Route::get('todolist', [DashboardController::class, 'get_todolist'])->name('todolist');
//     Route::post('add-todolist',[DashboardController::class, 'store_todolist_data'])->name('todolist_add');

//     Route::get('client_master', [DashboardController::class, 'get_clients'])->name('all_client');
//     Route::post('add-client-master',[DashboardController::class, 'store_client_master_data'])->name('client_master_add');
//     Route::get('client_master_delete/{id}',[DashboardController::class, 'delete_single_client_master'])->name('single_client_master_delete');
//     Route::get('client_edit/{id}',[DashboardController::class, 'get_single_client'])->name('single_client_edit');
//     Route::post('update-client',[DashboardController::class, 'update_client_data'])->name('client_update');

//     Route::get('project', [DashboardController::class, 'get_projects'])->name('all_projects');
//     Route::post('add-project',[DashboardController::class, 'store_project_data'])->name('project_add');
//     Route::get('project_details/{id}', [DashboardController::class, 'get_project_details'])->name('project_details');
//     Route::get('project_delete/{id}',[DashboardController::class, 'delete_single_project'])->name('single_project_delete');
//     Route::get('project_edit/{id}',[DashboardController::class, 'get_single_project'])->name('single_project_edit');
//     Route::post('update-project',[DashboardController::class, 'update_project_data'])->name('project_update');

//     Route::post('project_start',[DashboardController::class, 'project_start'])->name('project_start');
//     Route::post('project_hold',[DashboardController::class, 'project_hold'])->name('project_hold');
//     Route::post('project_complete',[DashboardController::class, 'project_complete'])->name('project_complete');
//     Route::post('project_cancel',[DashboardController::class, 'project_cancel'])->name('project_cancel');
    

//     Route::post('add-project-comment',[DashboardController::class, 'store_project_comment_data'])->name('project_comment_add');
//     Route::get('project_comment_delete/{id}',[DashboardController::class, 'delete_single_project_comment'])->name('single_project_comment_delete');

//     Route::get('get_calender/{id}',[DashboardController::class, 'get_calender'])->name('get_calender');
//     Route::post('action_calender',[DashboardController::class, 'action_calender'])->name('action_calender');

   

    
// 	//Place all Protected nested page Routes
// });

require __DIR__.'/auth.php';