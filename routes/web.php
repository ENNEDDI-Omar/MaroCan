<?php

use App\Http\Controllers\Admin\AccreditationBadgeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\MediaPlatformController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VolunteeringOfferController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Journalist\ArticleController as JournalistArticleController;
use App\Http\Controllers\User\AccreditationController;
use App\Http\Controllers\User\ApplicationController;
use App\Http\Controllers\User\ArticleController as UserArticleController;
use App\Http\Controllers\User\MatchController;
use App\Http\Controllers\User\ReservationController;
use App\Http\Controllers\User\VolunteerOfferController;
use App\Models\AccreditationBadge;
use App\Models\Application;
use Illuminate\Support\Facades\Route;

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

//// Route pour l'inscription
Route::get('/register', [RegisterController::class, 'index'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// // Route pour la connexion
 Route::get('/login', [LoginController::class, 'index'])->name('login.form');
 Route::post('/login', [LoginController::class, 'login'])->name('login'); 

// // Route pour le ForgetPassword
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

 //// Route pour la déconnexion et le ForgetPassword dans le middleware auth
Route::middleware("auth")->group(function(){
   
// // Route pour la déconnexion
 Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

 

 


// // Route pour la page d'accueil
 
 
// // Route pour le dashboard de l'admin




});



///////////////ADMIN////////////////////

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    //// Route pour les crud des utilisateurs
    Route::resource('users', UserController::class);

    // // Route pour banner l'utilisateur
    // Route::patch('users/{user}/ban', [UserController::class, 'ban']);

 // // Route pour le dashboard de l'admin
  Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
 // // Route pour les Articles
  Route::resource('articles', ArticleController::class);
 // //  Route pour les Tags
  Route::resource('tags', TagController::class);
// //Route pour les Accreditations
  Route::resource('accreditations', AccreditationBadgeController::class);
 // // Route pour les MediaPlatforms
  Route::resource('media-platforms', MediaPlatformController::class);
// Route pour la gestion des VolunteeringOffers par l'admin
  Route::resource('volunteering-offers', VolunteeringOfferController::class);
// Route pour la gestion des Applications par l'admin
    Route::resource('applications', AdminApplicationController::class)->only(['index', 'show', 'update']);


});

// Route pour l'utilisateur

Route::prefix('user')->name('user.')->middleware('user')->group(function () {
 //route vers le home 
 Route::resource('home', HomeController::class);
 //route vers la page des offres de bénévolat
 Route::resource('matchs', MatchController::class)->only(['index', 'show']);
    Route::get('matchs/search', [MatchController::class, 'search'])->name('matchs.search');
    Route::resource('volunteering-offers', VolunteerOfferController::class);
 // route pour le search des offres de bénévolat
     Route::get('volunteering-offers/search', [VolunteerOfferController::class, 'search'])->name('volunteering-offers.search');   
 //route vers la page des articles
    Route::resource('articles', UserArticleController::class)->only(['index', 'show']);
 // route pour search des articles
     Route::get('articles/search', [UserArticleController::class, 'search']);
 // route pour le formilaire du badge d'accreditation
    Route::resource('accreditations', AccreditationController::class)->only(['create', 'store']);
   
 // route pour l'applicattion de l'utilisateur aux offres de bénévolat
    Route::resource('applications', ApplicationController::class)->only(['store']);
 // route vers la visualisation des match
    Route::resource('matchs', MatchController::class)->only(['index', 'show']);
 
  
 // route pour la reservation des tickets des matchs
     Route::get('reservations/create/{match}', [ReservationController::class, 'create'])->name('reservations.create');
     Route::resource('reservations', ReservationController::class)->except(['create']);

   // In routes/web.php
   //Route::get('reservations/create/{id}', [ReservationController::class, 'create'])->name('user.reservation.create');







});


Route::prefix('journalist')->name('journalist.')->middleware('journalist')->group(function () {

// // Route vers ces Articles 
     Route::resource('articles', JournalistArticleController::class);

});






