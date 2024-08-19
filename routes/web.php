<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FeedbackController;

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
Route::get('', [FilmController::class, 'index']);
Route::get('/home', [FilmController::class, 'index']);
Route::get('/Descfilm',[FilmController::class, 'index'])->name('Home');
Route::get('/Descfilm/Movie/{slug}', [FilmController::class, 'show'])->name('Detail');
Route::get('/Descfilm/Search', [FilmController::class, 'Search'])->name('Search');
Route::get('/Descfilm/about', function () {
    return view('About', [
        'title' => 'About'
    ]);
})->name('About');


Route::post('addfilm', [FilmController::class, 'create'])->name('addfilm');
Route::post('editfilm', [FilmController::class, 'update'])->name('editfilm');
Route::post('removefilm', [FilmController::class, 'remove'])->name('removefilm');


Route::get('/Descfilm/login', [AkunController::class, 'loginindex'])->name('Login')->middleware('guest');
Route::post('login', [AkunController::class, 'login'])->name('login.post');
Route::get('/Descfilm/register', [AkunController::class, 'regisindex'])->name('Regis')->middleware('guest');
Route::post('Regis', [AkunController::class, 'regis'])->name('Regis.post');
Route::get('/Descfilm/Profile/{slug}', [AkunController::class, 'profile'])->name('Profil');
Route::get('/Descfilm/Editprofile', [AkunController::class, 'editprofile'])->name('Editprofile')->middleware('auth');
Route::post('editprofile', [AkunController::class, 'updateprofile'])->name('updateprofil');
Route::post('logout', [AkunController::class, 'logout'])->name('logout');



Route::post('addfav', [FavController::class, 'add'])->name('addfav');
Route::post('removefav', [FavController::class, 'remove'])->name('removefav');

Route::post('addlike', [LikeController::class, 'add'])->name('addlike');
Route::post('removelike', [LikeController::class, 'remove'])->name('removelike');

Route::post('addreview', [ReviewController::class, 'store'])->name('addreview');
Route::post('removereview', [ReviewController::class, 'remove'])->name('removereview');

Route::post('addfeedback', [FeedbackController::class, 'add'])->name('addfeedback');
// Route::get('/Descfilm/Changepass', function () {
//     return view('Changepass', [
//         'title' => 'Change Password'
//     ]);
// })->name('Changepass')->middleware('auth');

Route::get('/Descfilm/Admin', [AdminController::class, 'index'])->name('Admin')->middleware('guest:admin');
Route::get('/Descfilm/Admin/Dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth:admin');
Route::get('/Descfilm/Admin/Edit/{slug}', [AdminController::class, 'edit'])->name('edit.film')->middleware('auth:admin');
Route::get('/Descfilm/Admin/Addfilm', [AdminController::class, 'add'])->name('add.film')->middleware('auth:admin');
Route::post('registadmin', [AdminController::class, 'register'])->name('registadmin');
Route::post('loginadmin', [AdminController::class, 'login'])->name('loginadmin');
Route::post('logoutadmin', [AdminController::class, 'logout'])->name('logoutadmin');
