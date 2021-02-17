<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ScrtrDocAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SecretaireController;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

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
Route::delete('deleteService', [ScrtrDocAdminController::class, 'deleteServices']);
Route::get('detailsBlogVisiteur/{id}',[VisitorController::class,'detailsBlogVisiteurs']);

/* Secretaire & Doctor Pages */
Route::get('dashboard', [ScrtrDocAdminController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [ScrtrDocAdminController::class, 'profile'])->name('profile');
Route::get('editProfile',[ScrtrDocAdminController::class,'editProfile'])->name('editProfile');
Route::get('addAppointment',[ScrtrDocAdminController::class,'showAddAppointment'])->name('addAppointment');
Route::get('addAppointment/{id}',[ScrtrDocAdminController::class,'showAddAppointmentID']);
Route::post('addAppointmentInfo',[ScrtrDocAdminController::class,'addAppointment'])->name('addAppointmentInfo');
Route::get('getPatientSelected/{id}',[ScrtrDocAdminController::class,'getPatientSelected'])->name('getPatientSelected');
Route::get('checkDateAppointment/{date}/{timeD}/{timeF}',[ScrtrDocAdminController::class,'checkDateAppointment']);
Route::put('UpdateAppointment', [ScrtrDocAdminController::class, 'UpdateAppointments']);

/* Admin Pages */
Route::get('allDoctors', [AdminController::class, 'allDoctorsAdmin'])->name('allDoctors');
Route::get('allPatients', [AdminController::class, 'allPatientsAdmin'])->name('allPatients');
Route::get('appointments', [ScrtrDocAdminController::class, 'allAppointmentsAdmin'])->name('allAppointments');
Route::get('allSecretaries', [AdminController::class, 'allSecretariesAdmin'])->name('allSecretaries');
Route::get('allServices', [AdminController::class, 'allservicesAdmin'])->name('allservices');
Route::get('addUser/{type}', [AdminController::class, 'addUser'])->name('addUser');
Route::get('allBlogs',[AdminController::class,'allblogsAdmin'])->name('allblogs');
Route::get('detailsBlog/{id}',[AdminController::class,'detailsBlogAdmin'])->name('detailsBlog');
Route::put('updateProfile',[AdminController::class,'updateProfile']);
Route::post('addUserStore', [ScrtrDocAdminController::class, 'store']);
Route::get('editInformation/{id}',[AdminController::class,'editInformations'])->name('editInformation');
Route::put('updateInformation/{id}',[AdminController::class,'updateInformations']);
Route::get('blog/{id}',[AdminController::class,'blog']);
Route::post('addBlogStore', [AdminController::class, 'store']);
Route::get('addService',[AdminController::class,'addServicePage']);
Route::get('updateService/{id}',[AdminController::class,'updateServicePage']);
Route::post('serviceStore', [AdminController::class, 'storeSsrvice']);
Route::delete('deleteBlog', [ScrtrDocAdminController::class, 'destroy']);
Route::get('updateBlog/{id}',[ScrtrDocAdminController::class,'updateBlog']);
Route::post('updateBlogStore', [ScrtrDocAdminController::class, 'update']);
Route::get('updateImg', [ScrtrDocAdminController::class, 'updateimage']);
Route::delete('deleteImg', [ScrtrDocAdminController::class, 'destroyImage']);
Route::put('serviceUpdate', [AdminController::class, 'serviceUpdate']);
Route::delete('deleteService', [AdminController::class, 'deleteService']);


/* ADD patient Pages */
Route::get('informationUsers/{id}',[PatientController::class, 'plusinformation'])->name('informationUsers');
Route::get('allOrdinances', [PatientController::class, 'allOrdinancesPatient'])->name('allOrdinances');

/* ADD patient Imagerie Pages */
Route::post('addImagerie', [PatientController::class, 'addImageriePatient']);
Route::delete('deleteAppointment', [DoctorController::class, 'deleteAppointments']);

/* ADD users Pages */
Route::get('/searchPatient', [PatientController::class, 'getsearchPatient'])->name('searchPatient');
Route::get('/searchSecretaires', [SecretaireController::class, 'getsearchSecretaires'])->name('searchSecretaires');
Route::get('/searchDoctor', [DoctorController::class, 'getsearchDoctor'])->name('searchDoctor');
Route::get('/searchPatientDoctor', [ScrtrDocAdminController::class, 'getsearchPatientDoctor'])->name('searchPatientDoctor');
/* ADD OrdonnancePatient Pages */
Route::get('Ordonnance/{id}',[PatientController::class, 'PageOrdonnance'])->name('Ordonnance');
Route::post('ADDOrdonnance',[PatientController::class, 'addOrdannance']);
Route::get('getOrdannance/{id}', [PDFController::class, 'getOrdannance']);
Route::delete('deleteOrdonnance', [PatientController::class, 'deleteOrdonnance']);
Route::get('generate-pdf/{id}', [PDFController::class, 'generatePDF']);
Route::get('/getEventsDoctor/{id}', [DoctorController::class, 'getEventsDoctor']);

/* ADD Lettre Orientation Pages */
Route::get('lettre/{id}',[PatientController::class, 'lettre']);
Route::post('ADDLettre',[PatientController::class, 'ADDLettre']);
Route::put('updateLettre',[PatientController::class, 'updateLettre']);
Route::delete('deleteLettre',[PatientController::class, 'deleteLettre']);
Route::get('generateLettre-pdf/{id}', [PDFController::class, 'generatePDFLettre']);
Route::get('lettreOrientation/{id}', [PDFController::class, 'getLettreOrientation']);
Route::delete('deleteUser', [AdminController::class, 'destroy']);

/* ADD Commantaire Pages */
Route::get('commentaire/{id}',[PatientController::class, 'commentaire']);
Route::post('ADDcommentaire',[PatientController::class, 'ADDcommentaire']);
Route::put('updateCommentaire',[PatientController::class, 'ADDcommentaire']);
Route::delete('deleteComment',[PatientController::class, 'deleteComment']);

Route::get('app/{id}',[PatientController::class, 'app']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
