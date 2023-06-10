<?php

use Illuminate\Support\Facades\Route;
use App\Models\Subsection;
use App\Models\Mainsection;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Main section
Route::get('/mainsection', [App\Http\Controllers\SectionController::class, 'index'])->name('mainsection');
Route::post('/sectionstore', [App\Http\Controllers\SectionController::class, 'sectionstore'])->name('sectionstore');
Route::get('/mainsectionshow', [App\Http\Controllers\SectionController::class, 'mainsectionshow'])->name('mainsectionshow');
Route::get('/sectionedit/{section_id}/edit', [App\Http\Controllers\SectionController::class, 'sectionedit'])->name('sectionedit');
Route::delete('/sectiondelete/{id}', [App\Http\Controllers\SectionController::class, 'sectiondelete'])->name('sectiondelete');

// subsection
Route::get('/subsection',[App\Http\Controllers\SubsectionController::class, 'subsection'])->name('subsection');
Route::post('/subsectionstore', [App\Http\Controllers\SubsectionController::class, 'subsectionstore'])->name('subsectionstore');
Route::get('/subsectionedit/{subsection_id}/edit', [App\Http\Controllers\SubsectionController::class, 'subsectionedit'])->name('subsectionedit');
Route::delete('/subsectiondelete/{id}', [App\Http\Controllers\SubsectionController::class, 'subsectiondelete'])->name('subsectiondelete');




// Dashboard
Route::get('/dashboard', [App\Http\Controllers\SectionlistController::class, 'mainsubsection'])->name('mainsubsection');


// question
Route::get('/question', [App\Http\Controllers\QuestionController::class, 'question'])->name('question');