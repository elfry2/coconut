<?php

use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SymptomController;
use App\Http\Controllers\KnownCaseController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\SolutionController;

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

Route::get('/consult', [ConsultationController::class, 'consult'])->name('consultation.consult');
Route::post('/result', [ConsultationController::class, 'result'])->name('consultation.result');

Route::middleware(['auth'])->group(function () {
    //Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/task/create', [TaskController::class, 'create'])->name('task.create');
    Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::get('/task/{id}/delete', [TaskController::class, 'delete'])->name('task.delete');
    Route::get('/task/{id}/toggleCompletionStatus', [TaskController::class, 'toggleCompletionStatus'])->name('task.toggleCompletionStatus');

    Route::get('/folder/create', [FolderController::class, 'create'])->name('folder.create');
    Route::get('/folder/{id}/edit', [FolderController::class, 'edit'])->name('folder.edit');
    Route::get('/folder/{id}/delete/', [FolderController::class, 'delete'])->name('folder.delete');

    Route::get('/preference/{name}/reset', [PreferenceController::class, 'delete'])->name('preference.reset');
    Route::get('/preference/{name}/{value}', [PreferenceController::class, 'createOrUpdate'])->name('preference.set');
    Route::get('/preference/{name}', [PreferenceController::class, 'read'])->name('preference.get');

    Route::middleware(['admin'])->group(function(){
      Route::get('/users', [UserController::class, 'index'])->name('user.index');
      Route::get('/user/{id}/delete', [UserController::class, 'delete'])->name('user.delete');

      Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
      Route::get('/item/{id}/delete', [ItemController::class, 'delete'])->name('item.delete');
      Route::get('/item/{id}/edit', [ItemController::class, 'edit'])->name('item.edit');
    });

    Route::get('/items', [ItemController::class, 'index'])->name('item.index');

    Route::get('/items/generateReport', [ItemController::class, 'generateReport'])->name('item.generateReport');

    Route::get('/item/{id}/history', [HistoryController::class, 'index'])->name('history.index');
    Route::get('/history/create', [HistoryController::class, 'create'])->name('history.create');
    Route::get('/history/{id}/delete', [HistoryController::class, 'delete'])->name('history.delete');
    Route::get('/history/{id}/edit', [HistoryController::class, 'edit'])->name('history.edit');

    Route::get('/symptoms', [SymptomController::class, 'index'])->name('symptom.index');
    Route::get('/symptom/create', [SymptomController::class, 'create'])->name('symptom.create');
    Route::get('/symptom/{id}/delete', [SymptomController::class, 'delete'])->name('symptom.delete');
    Route::get('/symptom/{id}/edit', [SymptomController::class, 'edit'])->name('symptom.edit');

    Route::get('/known-cases', [KnownCaseController::class, 'index'])->name('knownCase.index');
    Route::get('/known-case/create', [KnownCaseController::class, 'create'])->name('knownCase.create');
    Route::get('/known-case/{id}/delete', [KnownCaseController::class, 'delete'])->name('knownCase.delete');
    Route::get('/known-case/{id}/edit', [KnownCaseController::class, 'edit'])->name('knownCase.edit');
    
    Route::get('/diseases', [DiseaseController::class, 'index'])->name('disease.index');
    Route::get('/disease/create', [DiseaseController::class, 'create'])->name('disease.create');
    Route::get('/disease/{id}/delete', [DiseaseController::class, 'delete'])->name('disease.delete');
    Route::get('/disease/{id}/edit', [DiseaseController::class, 'edit'])->name('disease.edit');
    
    Route::get('/solutions', [SolutionController::class, 'index'])->name('solution.index');
    Route::get('/solution/create', [SolutionController::class, 'create'])->name('solution.create');
    Route::get('/solution/{id}/delete', [SolutionController::class, 'delete'])->name('solution.delete');
    Route::get('/solution/{id}/edit', [SolutionController::class, 'edit'])->name('solution.edit');
});

Route::get('/', function () {
    return view('index');
})->name('root');


Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect()->route('knownCase.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
