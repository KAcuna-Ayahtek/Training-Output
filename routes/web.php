<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProgramController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', [StudentController::class, 'studentindex'])->name('Students.studentindex');
Route::get('/student/register', [StudentController::class, 'studentregister'])->name('Students.studentregister');
Route::post('/student/register', [StudentController::class, 'studentstore'])->name('Students.studentstore');
Route::get('/student/{student}/edit', [StudentController::class, 'studentedit'])->name('Students.studentedit');
Route::put('/student/{student}', [StudentController::class, 'studentupdate'])->name('Students.studentupdate');
Route::delete('/student/{student}', [StudentController::class, 'studentdelete'])->name('Students.studentdelete');
Route::get('/student/{student}', [StudentController::class, 'studentshow'])->name('Students.studentshow');


Route::get('/programs', [ProgramController::class, 'programindex'])->name('Programs.programindex');
Route::get('/programs/add', [ProgramController::class, 'create'])->name('Programs.programadd');
Route::post('/programs', [ProgramController::class, 'store'])->name('Programs.programstore');
Route::get('/programs/{id}/edit', [ProgramController::class, 'edit'])->name('Programs.programedit');
Route::put('/programs/{id}', [ProgramController::class, 'update'])->name('Programs.programupdate');
Route::delete('/programs/{id}', [ProgramController::class, 'destroy'])->name('Programs.programdelete');
Route::get('/programs/enroll/{student}', [ProgramController::class, 'showAvailablePrograms'])->name('Programs.programenroll');
Route::post('/programs/enroll/{student}/{program}', [ProgramController::class, 'enroll'])->name('Programs.enroll');





