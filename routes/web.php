<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
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
Route::resource('home', HomeController::class); 
 
// // Route pour le dashboard de l'admin
Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

});



///////////////ADMIN////////////////////








