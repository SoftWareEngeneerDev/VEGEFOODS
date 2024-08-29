<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
// -------------------------- ROUTE FOR ADMIN CONTROLLER------------------------------
Route::get('/admin', 'AdminController@admin');
Route::get('/commande', 'AdminController@commande');

// -------------------------- ROUTE FOR CLIENT CONTROLLER------------------------------
Route::get('/home', 'ClientController@home');
Route::get('/shop', 'ClientController@shop');
Route::get('/panier', 'ClientController@panier');
Route::get('/client_login', 'ClientController@login');
Route::get('/checkout', 'ClientController@checkout');
Route::get('/signup', 'ClientController@signup');
// -------------------------- ROUTE FOR PRODUCT CONTROLLER------------------------------
Route::get('/ajouterproduit', 'ProductController@ajouterproduit');
Route::post('/sauverproduit', 'ProductController@sauverproduit');
Route::get('/produit', 'ProductController@produit');
Route::get('/edit_produit/{id}', 'ProductController@edit_produit');
Route::post('/sauvermodifproduit', 'ProductController@sauvermodifproduit');
Route::get('/supprimer_produit/{id}', 'ProductController@supprimer_produit');


// -------------------------- ROUTE FOR CATEGORY CONTROLLER------------------------------
Route::get('/ajoutercategorie', 'CategoryController@ajouterCategorie');
Route::post('/sauvercategorie', 'CategoryController@sauvercategorie');
Route::get('/categorie', 'CategoryController@categorie');
Route::get('/edit_categorie/{id}', 'CategoryController@edit_categorie');
Route::post('/sauvermodifcategorie', 'CategoryController@sauvermodifcategorie');
Route::get('/supprimercategorie/{id}', 'CategoryController@supprimercategorie');

// -------------------------- ROUTE FOR CLIENT SLISERS------------------------------
Route::get('/ajouterslider', 'SliderController@ajouterslider');
Route::post('/sauverslider', 'SliderController@sauverslider');
Route::get('/slider', 'SliderController@slider');
Route::get('/edit_slider/{id}', 'SliderController@edit_slider');
Route::post('/sauvermodifslider', 'SliderController@sauvermodifslider');
Route::get('/supprimerslider/{id}', 'SliderController@supprimerslider');