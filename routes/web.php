<?php

use App\Http\Controllers\admin\AnnonceController;
use App\Http\Controllers\admin\ClasseController;
use App\Http\Controllers\admin\CourController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\AnnonceController as ControllersAnnonceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\student\CourController as StudentCourController;
use App\Http\Controllers\student\UniteContentController;
use App\Http\Controllers\student\UniteController as StudentUniteController;
use App\Http\Controllers\teacher\ExerciceController;
use App\Http\Controllers\teacher\FicheController;
use App\Http\Controllers\teacher\LessonController;
use App\Http\Controllers\teacher\ShowCourController;
use App\Http\Controllers\teacher\UniteController;
use App\Http\Controllers\teacher\CahierController;
use App\Http\Controllers\teacher\ScenarioController;
use App\Http\Controllers\UserController;
use App\Models\Scenario;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

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

Route::get('/', [ControllersAnnonceController::class, 'index']);

Route::group(['middleware' => ['auth', 'auth.teacher.admin']], function () {
    Route::get('/cpanel', [HomeController::class, 'dashboard'])->name('cpanel');
});
Route::group(['middleware' => ['auth', 'auth.admin']], function () {
    Route::resource('classes', ClasseController::class);
    Route::resource('teachers', TeacherController::class);
    Route::resource('students', StudentController::class);
    Route::resource('cours', CourController::class);
    Route::resource('annonces', AnnonceController::class);
});

Route::group(['middleware' => ['auth', 'auth.teacher']], function () {
    Route::resource('unites', UniteController::class);
    Route::resource('mescours', ShowCourController::class);
    Route::resource('fiches', FicheController::class);
    Route::resource('cahiers', CahierController::class);
    Route::resource('lessons', LessonController::class);
    Route::resource('exercices', ExerciceController::class);
    Route::resource('scenarios', ScenarioController::class);
});
Route::group(['middleware' => ['auth', 'auth.student']], function () {
    Route::resource('studentCours', StudentCourController::class);
    Route::resource('studentCoursUnites', StudentUniteController::class);
    Route::resource('studentCoursUniteContent', UniteContentController::class);
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('profile', UserController::class);
    Route::resource('upatePassword', PasswordController::class);
});
