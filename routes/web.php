<?php

use Illuminate\Support\Facades\Route;

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

// affiche l'accueil laravel
Route::get('/', function () {
    return view('welcome');
});

// routes de l'authentification
Auth::routes();

// route home une fois connecté
// Route:: méthode http ( url , [ contôleur , 'méthode'])->name('nom choisi')
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route messages => créé 7 routes différentes (moins les 2 inutiles index et show)
Route::resource('/messages', App\Http\Controllers\MessageController::class)->except(['index', 'show']);

// route commentaires => créé 7 routes différentes (moins les 2 inutiles index et show)
Route::resource('/commentaires', App\Http\Controllers\CommentaireController::class)->except(['index', 'show', 'create']);

// route commentaires => créé 7 routes différentes (moins les 2 inutiles index et show)
Route::resource('/users', App\Http\Controllers\UserController::class)->except(['index', 'create', 'store']);

// route "normale" vers le profil user
// Route:: méthode http ( url , [ contôleur , 'méthode'])->name('nom choisi')
Route::get('/users/profil/{user}', [App\Http\Controllers\UserController::class, 'profil'])->name('profil');
