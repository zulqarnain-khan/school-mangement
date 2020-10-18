<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\GeneralController; 
use App\Http\Controllers\EmployeeController;

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
    return view('auth.login');
});

Auth::routes(['verify'=> true]);

Route::group([ 'middleware' => 'SuperAdmin'], function()
{
Route::get('/superadmin',[App\Http\Controllers\AdminController::class,'index'])->name('superadmin');
// Campus Routes
Route::match(['get', 'post'], '/campus', [CampusController::class, 'index'])->name("campus");

Route::match(['post'],'/addcampus', [App\Http\Controllers\CampusController::class, 'store'])->name('addcampus');

Route::get('/showcampus', [App\Http\Controllers\CampusController::class, 'showcampus'])->name('showcampus');

Route::get('/editcampus', [App\Http\Controllers\CampusController::class, 'getcampusdata'])->name('editcampus');

Route::post('/updatecampus', [App\Http\Controllers\CampusController::class, 'updatecampusdata'])->name('updatecampus');

Route::get('/deletecampus', [App\Http\Controllers\CampusController::class, 'deletecampusdata'])->name('deletecampus');

});

Route::group([ 'middleware' => 'Admin'], function()
{
    Route::get('admin',[App\Http\Controllers\AdminController::class,'index'])->name('admin');
 // Academics Route Start

    //section route
    Route::match(['get', 'post'], '/section', [AcademicsController::class, 'index_section'])->name("section");
    Route::match(['get', 'post'], '/addsection', [AcademicsController::class, 'add_section'])->name("addsection");
    Route::match(['get', 'post'], '/editsection', [AcademicsController::class, 'edit_section'])->name("editsection");
    Route::match(['get', 'post'], '/updatesection', [AcademicsController::class, 'update_section'])->name("updatesection");
    Route::match(['get', 'post'], '/deletesection', [AcademicsController::class, 'delete_section'])->name("deletesection");
    //end section routes

    //Class Routes
    Route::match(['get', 'post'], '/class', [AcademicsController::class, 'index_class'])->name("class");
    Route::match(['get', 'post'], '/addclass', [AcademicsController::class, 'add_class'])->name("addclass");
    Route::match(['get', 'post'], '/editclass', [AcademicsController::class, 'edit_class'])->name("editclass");
    Route::match(['get', 'post'], '/updateclass', [AcademicsController::class, 'update_class'])->name("updateclass");
    Route::match(['get', 'post'], '/deleteclass', [AcademicsController::class, 'delete_class'])->name("deleteclass");
    //end class routes

    //Subject Routes
    Route::match(['get', 'post'], 'subject', [AcademicsController::class, 'index_subject'])->name("subject");
    Route::match(['get', 'post'], '/addsubject', [AcademicsController::class, 'add_subject'])->name("addsubject");
    Route::match(['get', 'post'], '/editsubject', [AcademicsController::class, 'edit_subject'])->name("editsubject");
    Route::match(['get', 'post'], '/updatesubject', [AcademicsController::class, 'update_subject'])->name("updatesubject");
    Route::match(['get', 'post'], '/deletesubject', [AcademicsController::class, 'delete_subject'])->name("deletesubject");
    //end Subject routes

    //session-batch Routes
    Route::match(['get', 'post'], '/session-batch', [AcademicsController::class, 'index_sessionbatch'])->name("session-batch");
    Route::match(['get', 'post'], '/addsession-batch', [AcademicsController::class, 'add_sessionbatch'])->name("addsession-batch");
    Route::match(['get', 'post'], '/editsession-batch', [AcademicsController::class, 'edit_sessionbatch'])->name("editsession-batch");
    Route::match(['get', 'post'], '/updatesession-batch', [AcademicsController::class, 'update_sessionbatch'])->name("updatesession-batch");
    Route::match(['get', 'post'], '/deletesession-batch', [AcademicsController::class, 'delete_sessionbatch'])->name("deletesession-batch");
    //end session-batch routes

     //Subject Group NAME Routes
     Route::match(['get', 'post'], '/sgroup', [AcademicsController::class, 'index_sgroup'])->name("sgroup");
     Route::match(['get', 'post'], '/addsgroup', [AcademicsController::class, 'add_sgroup'])->name("addsgroup");
     Route::match(['get', 'post'], '/editsgroup', [AcademicsController::class, 'edit_sgroup'])->name("editsgroup");
     Route::match(['get', 'post'], '/updatesgroup', [AcademicsController::class, 'update_sgroup'])->name("updatesgroup");
     //end Subject Group Routes

     //Subject Group Routes
     Route::match(['get', 'post'], 'subjectgroup', [AcademicsController::class, 'index_subjectgroup'])->name("subjectgroup");
     Route::match(['get', 'post'], '/addsubjectgroup', [AcademicsController::class, 'add_subjectgroup'])->name("addsubjectgroup");
     Route::match(['get', 'post'], '/editsubjectgroup', [AcademicsController::class, 'edit_subjectgroup'])->name("editsubjectgroup");
     Route::match(['get', 'post'], '/updatesubjectgroup', [AcademicsController::class, 'update_subjectgroup'])->name("updatesubjectgroup");
     //end Subject route



// Academatics Routes End


// Student Routes Start

    Route::match(['get', 'post'], '/student', [StudentController::class, 'index_student'])->name("student");
    Route::match(['post'],'/addstudent', [StudentController::class, 'add_student'])->name('addstudent');
    Route::get('/showstudent', [StudentController::class, 'showstudent'])->name('showstudent');
    Route::get('/editstudent/{id}', [StudentController::class, 'getstudentdata'])->name('editstudent');
    Route::match(['get', 'post'], '/updatestudent', [StudentController::class, 'update_student'])->name("updatestudent");
    
    Route::get('/showstudent', [StudentController::class, 'show'])->name('showstudent');
    Route::get('/getsections/{id}',  [StudentController::class, 'fetch']);
    Route::get('/getsection/{id}',  [GeneralController::class, 'getSections']);
    Route::get('/getclasses/',  [GeneralController::class, 'getClasses']);
    Route::get('getmatchingdata/{id}',  [StudentController::class, 'fetchstudentdata']);

    Route::get('/searchstudent', [StudentController::class, 'searchstudent'])->name('searchstudent');

/// Student Attendance start 
    Route::get('/student-attendance', [StudentAttendanceController::class, 'student_attendance'])->name('student-attendance');
    Route::post('/get-abscent-list', [StudentAttendanceController::class, 'getNonPresentStudents'])->name('get-abscent-list');
    Route::post('/get-std-for-attendance', [StudentAttendanceController::class, 'get_stds_for_attendance'])->name('get-std-for-attendance');
    Route::post('/save-students-attendance', [StudentAttendanceController::class, 'save_students_attendance'])->name('save-students-attendance');
    Route::match(['post','get'],'/non-present-students', [StudentAttendanceController::class, 'non_present_students'])->name('non-present-students');
/// Student Attendance end..
    Route::get('viewstudentdetails/{id}', [StudentController::class, 'showdetails'])->name('viewstudentdetails');

// Fee Routes Start

    Route::match(['get', 'post'], '/feecategory', [FeeController::class, 'index_feecategory'])->name("feecategory");
    Route::match(['get', 'post'], '/addfeecategory', [FeeController::class, 'add_feecategory'])->name("addfeecategory");
    Route::match(['get', 'post'], '/editfeecategory', [FeeController::class, 'edit_feecategory'])->name("editfeecategory");
    Route::match(['get', 'post'], '/updatefeecategory', [FeeController::class, 'update_feecategory'])->name("updatefeecategory");

    Route::match(['get', 'post'], '/fee-structure', [FeeController::class, 'fee_structure'])->name("fee-structure");
    Route::match(['get', 'post'], '/add-fee-structure', [FeeController::class, 'add_fee_structure'])->name("add-fee-structure");

//Employee Routes Start
Route::match(['get', 'post'], '/employee', [EmployeeController::class, 'index_employee'])->name("employee");
Route::match(['post'],'/addemployee', [EmployeeController::class, 'add_employee'])->name('addemployee');
Route::get('/showemployee', [EmployeeController::class, 'showemployee'])->name('showemployee');
Route::get('/editemployee/{id}', [EmployeeController::class, 'getemployeedata'])->name('editemployee');
Route::match(['get', 'post'], '/updateemployee', [EmployeeController::class, 'update_employee'])->name("updateemployee");
});
