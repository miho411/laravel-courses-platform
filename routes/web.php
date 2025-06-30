<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Mail\TestMailer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;


Route::get('/', function () {

      $courses = Course::with(['user', 'category'])->paginate(15);
      return view('courses',compact('courses'));


});

Route::get('/test', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('create/instructor/{id}', [InstructorController::class, 'create1'])->name('instructor.create1');
Route::get('create/instructor', [InstructorController::class, 'create2'])->name('instructor.create2');
Route::patch("store/instructor/{id}", [InstructorController::class, 'store'])->name('instructor.store');
Route::post("store/instructor", [InstructorController::class, 'store2'])->name('instructor.store2');
Route::get('instructor/{id}/dashboard', [InstructorController::class, 'dashboard'])->name('instructor.dashboard');
Route::get('instructor/{id}/create-course', [CourseController::class, 'create'])->name('course.create');
Route::post('instructor/{id}/store-course', [CourseController::class, 'store'])->name('course.store');

// Route::get('/send-test', function () {
//     Mail::to('mahaalkurmaji@yahoo.com')->send(new TestMailer());
//     return 'تم إرسال الإيميل!';
// });
