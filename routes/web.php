<?php

use App\Http\Controllers\AcademicClassController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ClassBillController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\GlobalSettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\YearTypeController;
use App\Models\ClassSubject;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Global Settings Routes
Route::controller(GlobalSettingController::class)->group(function(){
    Route::get('globalsettings','index')->name('globalsettings.index')->middleware('auth');
    Route::post('globalsettings/create','create')->name('globalsettings.create')->middleware('auth');
    Route::put('globalsettings/edit/{id}','update')->name('globalsettings.update')->middleware('auth');
});

//School Settings Routes
Route::controller(SchoolController::class)->group(function(){
    Route::get('schools','index')->name('schools.index')->middleware('auth');;
    Route::post('schools/create', 'create')->name('schools.create')->middleware('auth');;
    Route::get('schools/edit/{id}', 'edit')->name('schools.edit')->middleware('auth');;
    Route::put('schools/edit/{id}', 'update')->name('schools.update')->middleware('auth');
    Route::get('schools/details/{id}', 'details')->name('schools.details')->middleware('auth');;
});


//Roles Routes
Route::controller(RoleController::class)->group(function(){
    Route::get('roles','index')->name('roles.index')->middleware('auth');;
    Route::post('roles/create','create')->name('roles.create')->middleware('auth');;
    Route::get('roles/edit/{id}','edit')->name('roles.edit')->middleware('auth');;
    Route::get('roles/details/{id}','details')->name('roles.details')->middleware('auth');;
});

//Account Routes
Route::controller(AccountController::class)->group(function(){
    Route::get('account/users', 'users')->name('account.users')->middleware('auth');
    Route::get('account/register', 'register')->name('account.register')->middleware('auth');
    Route::get('account/users/edit/{id}','edit')->name('account.edit')->middleware('auth');
    Route::post('account/users/edit/{id}','update')->name('account.update')->middleware('auth');
    Route::get('account/users/details/{id}','details')->name('account.details')->middleware('auth');
    Route::get('account/users/deactivate/{id}','deactivate')->name('account.deactivate')->middleware('auth');
    Route::get('account/users/delete/{id}','delete')->name('account.destroy')->middleware('auth');
    Route::post('account/register','store')->name('account.store')->middleware('auth');
    Route::get('login', 'login')->name('login');
    Route::post('login','authenticate')->name('authenticate');
    Route::post('/change-password', 'changePassword')->name('change.password')->middleware('auth');;
    Route::post('/update-profile', 'updateProfile')->name('update.profile')->middleware('auth');;
    Route::get('/logout', 'logout')->name('logout');
});

//Home Routes
Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->middleware('auth')->name('index');
    Route::get('home', 'index')->middleware('auth')->name('home');
});

//Sections Routes
Route::controller(SectionController::class)->group(function(){
    Route::get('sections','index')->middleware('auth')->name('sections.index');
    Route::post('sections/create','store')->name('sections.create')->middleware('auth');
    Route::get('sections/edit/{id}','edit')->name('sections.edit')->middleware('auth');
    Route::post('sections/edit/{id}','update')->name('sections.update')->middleware('auth');
    Route::get('sections/details/{id}','details')->name('sections.details')->middleware('auth');
    Route::get('sections/delete/{id}','delete')->name('sections.delete')->middleware('auth');
});

//Students Route
Route::controller(StudentController::class)->group(function(){
    Route::get('students','default')->name('students.default')->middleware('auth');
    Route::get('students/index/{schoolId}','index')->name('students.index')->middleware('auth');
    Route::get('students/create/{schoolId}','create')->name('students.create')->middleware('auth');
    Route::post('students/create/{schoolId}','store')->name('students.store')->middleware('auth');
    Route::get('students/details/{schoolId}/{id}','details')->name('students.details')->middleware('auth');
    Route::get('students/edit/{schoolId}/{id}','edit')->name('students.edit')->middleware('auth');
    Route::put('students/edit/{schoolId}/{id}','update')->name('students.update')->middleware('auth');
    Route::get('students/delete/{schoolId}/{id}','destroy')->name('students.destroy')->middleware('auth');
    Route::get('students/deactivate/{schoolId}/{id}','deactivate')->name('students.deactivate')->middleware('auth');
    Route::post('students/updateImage/{schoolId}/{id}','updateImage')->name('students.updateImage')->middleware('auth');
});

//LevelTypes Route
Route::controller(LevelTypeController::class)->group(function(){
    Route::get('leveltypes','index')->name('leveltypes.index')->middleware('auth');
    Route::post('leveltypes/create','store')->name('leveltypes.create')->middleware('auth');
    Route::get('leveltypes/edit/{id}','edit')->name('leveltypes.edit')->middleware('auth');
    Route::post('leveltypes/edit/{id}','update')->name('leveltypes.update')->middleware('auth');
    Route::get('leveltypes/details/{id}','details')->name('leveltypes.details')->middleware('auth');
    Route::get('leveltypes/delete/{id}', 'destroy')->name('leveltypes.delete')->middleware('auth');
});

//Academic Classess Route
Route::controller(AcademicClassController::class)->group(function(){
    Route::get('academicclasses','index')->name('academicclasses.index')->middleware('auth');
    Route::get('academicclasses/create','create')->name('academicclasses.create')->middleware('auth');
    Route::post('academicclasses/create','store')->name('academicclasses.store')->middleware('auth');
    Route::get('academicclasses/details/{id}','details')->name('academicclasses.details')->middleware('auth');
    Route::get('academicclasses/edit/{id}','edit')->name('academicclasses.edit')->middleware('auth');
    Route::post('academicclasses/edit/{id}','edit')->name('academicclasses.update')->middleware('auth');
    Route::get('academicclasses/delete/{id}','destroy')->name('academicclasses.delete')->middleware('auth');
});


//Years Route
Route::controller(YearController::class)->group(function(){
    Route::get('years','index')->name('years.index')->middleware('auth');
    Route::get('years/create','create')->name('years.create')->middleware('auth');
    Route::post('years/create','store')->name('years.store')->middleware('auth');
    Route::get('years/edit/{id}','edit')->name('years.edit')->middleware('auth');
    Route::post('years/edit/{id}','edit')->name('years.update')->middleware('auth');
    Route::get('years/delete/{id}','delete')->name('years.delete')->middleware('auth');
    Route::get('years/details/{id}','details')->name('years.details')->middleware('auth');
});

//Terms Route
Route::controller(TermController::class)->group(function(){
    Route::get('terms','index')->name('terms.index')->middleware('auth');
    Route::get('terms/create','create')->name('terms.create')->middleware('auth');
    Route::post('terms/create','store')->name('terms.store')->middleware('auth');
    Route::get('terms/edit/{id}','edit')->name('terms.edit')->middleware('auth');
    Route::post('terms/edit/{id}','update')->name('terms.update')->middleware('auth');
    Route::get('terms/details/{id}','details')->name('terms.details')->middleware('auth');
    Route::get('terms/delete/{id}','destroy')->name('terms.destroy')->middleware('auth');
});

//Subjects Route
Route::controller(SubjectController::class)->group(function(){
    Route::get('subjects','index')->name('subjects.index');
    Route::post('subjects/create','create')->name('subjects.create')->middleware('auth');
    Route::get('subjects/edit/{id}','edit')->name('subjects.edit')->middleware('auth');
    Route::post('subjects/edit/{id}','update')->name('subjects.update')->middleware('auth');
    Route::get('subjects/details/{id}','details')->name('subjects.details')->middleware('auth');
    Route::get('subjects/delete/{id}','destroy')->name('subjects.destroy')->middleware('auth');
});

//Faculties Route
Route::controller(FacultyController::class)->group(function(){
    Route::get('faculties','index')->name('faculties.index')->middleware('auth');
    Route::get('faculties/create','create')->name('faculties.create')->middleware('auth');
    Route::post('faculties/create','store')->name('faculties.store')->middleware('auth');
    Route::get('faculties/details/{id}','details')->name('faculties.details')->middleware('auth');
    Route::get('faculties/edit/{id}','edit')->name('faculties.edit')->middleware('auth');
    Route::post('faculties/edit/{id}','update')->name('faculties.update')->middleware('auth');
    Route::get('faculties/delete/{id}','destroy')->name('faculties.destroy')->middleware('auth');
    Route::get('faculties/downloadPDF','downloadPDF')->name('faculties.downloadpdf')->middleware('auth');
    Route::post('faculties/updateImage/{id}','updateImage')->name('faculties.updateImage')->middleware('auth');
});

//ClassSubjects Routes
Route::controller(ClassSubjectController::class)->group(function(){
    Route::post('classsubjects/{classId}/create','create')->name('classsubjects.store')->middleware('auth');
    Route::get('classsubjects/edit/{classId}/{id}','edit')->name('classsubjects.edit')->middleware('auth');
    Route::put('classsubjects/edit/{classId}/{id}','update')->name('classsubjects.update')->middleware('auth');
    Route::get('classsubjects/delete/{classId}/{id}','destroy')->name('classsubjects.destroy')->middleware('auth');
});

//ClassBills Routes
Route::controller(ClassBillController::class)->group(function(){
    Route::post('classbills/{classId}/create','create')->name('classbills.store')->middleware('auth');
    Route::get('classbills/edit/{classId}/{id}','edit')->name('classbills.edit')->middleware('auth');
    Route::put('classbills/edit/{classId}/{id}','update')->name('classbills.update')->middleware('auth');
    Route::get('classbills/delete/{classId}/{id}','destroy')->name('classbills.destroy')->middleware('auth');
});


