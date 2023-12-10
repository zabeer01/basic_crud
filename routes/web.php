<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;


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



Route::post('/students/store', [StudentsController::class, 'StoreStudents'])->name('store_students');
Route::get('/students/all-students', [StudentsController::class, 'AllStudents'])->name('all_students');
Route::get('/students/add-students', [StudentsController::class, 'AddStudents'])->name('add_students');
Route::get('/students/edit-students/{id}', [StudentsController::class, 'EditStudents'])->name('edit_students'); 
Route::post('/students/soft/delete/students', [StudentsController::class, 'StudentSoftDelete'])->name('student_soft_delete'); 