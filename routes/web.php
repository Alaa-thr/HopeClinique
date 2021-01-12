<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ScrtrDocController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SecretaireController;

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
/* Visitor Pages */
Route::get('/', [VisitorController::class, 'index']);
Route::get('welcome', [VisitorController::class, 'index']);
Route::get('about',[VisitorController::class,'aboutUs'])->name('about');
Route::get('blogs',[VisitorController::class,'blogs'])->name('blogs');
Route::get('bolgDetails',[VisitorController::class,'bolgDetails'])->name('bolgDetails');
Route::get('contact',[VisitorController::class,'contactUs'])->name('contact');
Route::get('doctors',[VisitorController::class,'doctors'])->name('doctors');
Route::get('services',[VisitorController::class,'services'])->name('services');

/* Secretaire & Doctor Pages */
Route::get('dashboard', [ScrtrDocController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [ScrtrDocController::class, 'profile'])->name('profile');
Route::get('editProfile',[ScrtrDocController::class,'editProfile'])->name('editProfile');

/* Admin Pages */
Route::get('allDoctors', [AdminController::class, 'allDoctorsAdmin'])->name('allDoctors');
Route::get('allPatients', [AdminController::class, 'allPatientsAdmin'])->name('allPatients');
Route::get('appointments', [AdminController::class, 'allAppointmentsAdmin'])->name('allAppointments');
Route::get('allSecretaries', [AdminController::class, 'allSecretariesAdmin'])->name('allSecretaries');
Route::get('allServices', [AdminController::class, 'allservicesAdmin'])->name('allservices');
Route::get('addUser/{type}', [AdminController::class, 'addUser'])->name('addUser');
Route::get('allBlogs',[AdminController::class,'allblogsAdmin'])->name('allblogs');
Route::get('detailsBlog',[AdminController::class,'detailsBlogAdmin'])->name('detailsBlog');
Route::put('updateProfile',[AdminController::class,'updateProfile']);
Route::delete('addUserdelete/{id}', [AdminController::class, 'destroy']);

/* ADD patient Pages */

Route::post('addUser', [ScrtrDocController::class, 'store']);
/* ADD secretaire Pages */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
