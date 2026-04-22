<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\InternController;
use App\Http\Controllers\RequestInternshipController;
use App\Http\Controllers\UserInternController;
use App\Http\Controllers\ProjectController;
use App\Models\Intern;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});


Route::get('/user/dashboard', [UserInternController::class, 'index'])->name('user.dashboard');
Route::get('/user/tasks', [UserInternController::class, 'task'])->name('user.task');
Route::get('/user/tasks/{id}', [UserInternController::class, 'task_detail'])->name('user.task_detail');
Route::get('/user/update-intern/{intern}', [UserInternController::class, 'edit'])->name('user.edit');
Route::get('/user/intern', [UserInternController::class, 'intern'])->name('user.intern');
Route::get('/user/intern-detail/{intern}', [UserInternController::class, 'detail'])->name('user.detail');
Route::get('/user/files', [UserInternController::class, 'file'])->name('user.file');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/user/dashboard', [UserInternController::class, 'index']);


// Dashboard Route, hanya untuk yang sudah login
// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Routes untuk CRUD Divisions
Route::resource('divisions', DivisionController::class)->middleware(['auth', 'verified']);

Route::resource('internships', controller: InternshipController::class)->middleware(['auth', 'verified']);

Route::resource('request-internship', controller: RequestInternshipController::class);

Route::put('/request-internship/{id}/accepted', [RequestInternshipController::class, 'accepted'])
    ->name('request_internship.accepted');


// Routes untuk Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::resource('projects', ProjectController::class);

Route::resource('files', FileController::class);
Route::resource('intern', InternController::class);

Route::get('files/download/{file}', [FileController::class, 'download'])->name('files.download');

Route::patch('/request/{intern}/status/{status}', [InternController::class, 'updateStatus'])->name('intern.updateStatus');

Route::post('/intern/recommend', [InternController::class, 'recommendDivision'])->name('intern.recommend');

require __DIR__.'/auth.php';
