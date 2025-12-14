<?php

use Livewire\Volt\Volt;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherAuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendanceController;
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

require __DIR__.'/auth.php';

// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminAuthController::class, 'login']);
    Route::get('dashboard', function () {
        return 'Admin Dashboard';
    })->middleware('auth', 'ensure.admin')->name('dashboard');
});

// Teacher
Route::prefix('teacher')->name('teacher.')->group(function () {
    Route::get('login', [TeacherAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [TeacherAuthController::class, 'login']);
    Route::get('dashboard', function () {
        return 'Teacher Dashboard';
    })->middleware('auth', 'ensure.teacher')->name('dashboard');
});

// // Student
// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// // Teacher
// Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
// Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
//Attendance

// Resourceful route (index, store, show, edit, update, destroy)
Route::resource('students', StudentController::class);

// Step-wise forward (Sav & Forward)
Route::post('/students/forward/{step}', [StudentController::class, 'forward'])->name('students.forward');

// Resourceful route for TeacherController
Route::resource('teachers', TeacherController::class);
// Resourceful route for AttendanceController
Route::resource('attendance', AttendanceController::class);
Route::get('/attendance/report', [AttendanceController::class, 'report'])->name('attendance.report');
Route::get('/attendance/export/excel', [AttendanceController::class, 'exportExcel'])->name('attendance.export.excel');
Route::get('/attendance/export/pdf', [AttendanceController::class, 'exportPDF'])->name('attendance.export.pdf');


