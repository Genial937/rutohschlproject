<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\DepartmenttsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\ParentsController;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\LogoutController;

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

Route::resource('login', LoginController::class);
Route::middleware(['auth'])->group(function () {
    Route::resource('/', DashboardController::class);
Route::resource('admin', AdminController::class);
Route::resource('curriculum', CurriculumController::class);
Route::resource('schools', SchoolsController::class);
Route::resource('departments', DepartmenttsController::class);
Route::resource('courses', CoursesController::class);
Route::resource('units', UnitsController::class);
Route::resource('students', StudentsController::class);
Route::resource('parents', ParentsController::class);
Route::resource('exams', ExamsController::class);
Route::resource('results', ResultsController::class);
Route::resource('roles', RolesController::class);
Route::resource('permissions', PermissionsController::class);
Route::get('/get/semester/{id}', [CurriculumController::class, 'semester']);
Route::post('/search-exam', [ResultsController::class, 'search'])->name('exams.search');
Route::post('/exam-results', [ResultsController::class, 'results'])->name('exams.results');
Route::get('/single/result/{id}', [ResultsController::class, 'show']);
Route::post('/push/result/{id}',[ResultsController::class, 'send_sms']);
Route::resource('logout', LogoutController::class);
});