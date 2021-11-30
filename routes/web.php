<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

// ici on demande d'utiliser la méthode index qui se trouve dans le siteController
Route::get('/', [SiteController::class, 'index']);

Route::get('/blog/{id?}', [SiteController::class, 'blog'])->name('blog'); //id? pour le rendre optionnel
// Route::get('/blog', function () {
//     return view('voyagerLaravel.blog');
// });

//Pour afficher les articles
Route::get('/post/{slug}', [SiteController::class, 'show'])->name('show'); //slug est un champ dans la table Posts

//Pour envoyer les données du formulaire de contact: ATTENTION il faut spécifier la méthode POST
Route::post('/contact', [SiteController::class, 'store'])->name('contact');

Route::get('/about', function () {
    return view('voyagerLaravel.about');
});

Route::get('/contact', function () {
    return view('voyagerLaravel.contact');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});