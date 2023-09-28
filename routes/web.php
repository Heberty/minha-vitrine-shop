<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pages\PagesController;
use App\Http\Controllers\Contato\ContatoController;
use App\Http\Controllers\Admin\SlidesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\TypesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\CardsController;
use App\Http\Controllers\Pages\CartController;

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

Route::feeds();

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/ofertas/{categoria?}', [PagesController::class, 'offers'])->name('offers');
Route::get('/oferta/{slug}', [PagesController::class, 'offer'])->name('offer');
Route::get('/sobre', [PagesController::class, 'about'])->name('about');
Route::any('/buscar', [PagesController::class, 'search'])->name('products.search');
Route::post('/enviar', [ContatoController::class, 'sendContact'])->name('send');

// Cart
Route::get('/session', [CartController::class, 'session'])->name('session');
Route::post('/enviar-carrinho', [CartController::class, 'sendCart'])->name('sendCart');
Route::get('/carrinho-de-compras', [CartController::class, 'cart'])->name('cart');
Route::get('/delete', [CartController::class, 'put'])->name('put');
Route::get('/adicionar-produto/{product}', [CartController::class, 'addCart'])->name('add.cart');
Route::get('/deletar-produto/{product}', [CartController::class, 'deleteCart'])->name('delete.cart');
Route::get('/deletar-todos-os-itens', [CartController::class, 'deleteAllCart'])->name('delete.all.cart');


Route::group(['middleware' => ['auth'], 'namespace' => 'Admin'], function() {
	Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
		Route::get('/', 'AdminController@index')->name('index');

		/* Rotas de Slides*/
		Route::get('slides', [SlidesController::class, 'index'])->name('slides.index');
		Route::get('slides/create', [SlidesController::class, 'create'])->name('slides.create');
		Route::post('slides/store', [SlidesController::class, 'store'])->name('slides.store');
		Route::get('slides/edit/{slide}', [SlidesController::class, 'edit'])->name('slides.edit');
		Route::patch('slides/{slide}', [SlidesController::class, 'update'])->name('slides.update');
		Route::delete('slides/delete/{slide}', [SlidesController::class, 'destroy'])->name('slides.destroy');

		/* Rotas de Produtos*/
		Route::get('products', [ProductsController::class, 'index'])->name('products.index');
		Route::get('products/create', [ProductsController::class, 'create'])->name('products.create');
		Route::post('products/store', [ProductsController::class, 'store'])->name('products.store');
		Route::get('products/edit/{product}', [ProductsController::class, 'edit'])->name('products.edit');
		Route::patch('products/{product}', [ProductsController::class, 'update'])->name('products.update');
		Route::delete('products/delete/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
		Route::get('products/delete-image/{image}', [ProductsController::class, 'destroyImage'])->name('products.destroyImage');

		/* Rotas de Blog*/
		Route::get('blogs', [BlogsController::class, 'index'])->name('blogs.index');
		Route::get('blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
		Route::post('blogs/store', [BlogsController::class, 'store'])->name('blogs.store');
		Route::get('blogs/edit/{blog}', [BlogsController::class, 'edit'])->name('blogs.edit');
		Route::patch('blogs/{blog}', [BlogsController::class, 'update'])->name('blogs.update');
		Route::delete('blogs/delete/{blog}', [BlogsController::class, 'destroy'])->name('blogs.destroy');
		Route::get('blogs/delete-image/{image}', [BlogsController::class, 'destroyImage'])->name('blogs.destroyImage');

		/* Rotas de Categorias*/
		Route::get('types', [TypesController::class, 'index'])->name('types.index');
		Route::get('types/create', [TypesController::class, 'create'])->name('types.create');
		Route::post('types/store', [TypesController::class, 'store'])->name('types.store');
		Route::get('types/edit/{type}', [TypesController::class, 'edit'])->name('types.edit');
		Route::patch('types/{type}', [TypesController::class, 'update'])->name('types.update');
		Route::delete('types/delete/{type}', [TypesController::class, 'destroy'])->name('types.destroy');

		/* Rotas de Configurações*/
		Route::get('settings/edit/{setting}', [SettingsController::class, 'edit'])->name('settings.edit');
		Route::patch('settings/{setting}', [SettingsController::class, 'update'])->name('settings.update');
		
		/* Rotas de Cartões*/
		Route::get('cards/edit/{card}', [CardsController::class, 'edit'])->name('cards.edit');
		Route::patch('cards/{card}', [CardsController::class, 'update'])->name('cards.update');
	});
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtosxml', [ProductsController::class, 'productsXml']);

Route::get('/produtoscsv','Pages\PagesController@export');

