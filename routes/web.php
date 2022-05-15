<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Symfony\Component\VarDumper\VarDumper;
use App\Models\Product\DB;
use Carbon\Carbon;

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
Route::get('/', function () {
    return view('index', [
      "produits" => Product::inRandomOrder()->filter()->limit(3)->get(),
      "cheapestProduit" => Product::where('prix', Product::min('prix'))->first(),
      "lastProduits" => Product::latest()->filter()->limit(4)->get(),
      //"bestProducts" => Product::whereHas('comments')->withCount('comments')->orderBy('comments_count', 'asc')->take(4)->filter()->get(),
      'bestProducts' => Product::whereHas('comments')->withAvg('comments', 'note')->take(4)->get()->sortByDesc('comments_avg_note'),
    ]);
});
Route::get('/produits', [ProductController::class,'index']);

Route::get('/produits/{product}', [ProductController::class,'show']);

Route::get('/categorie', [CategoryController::class,'index']);

Route::get('/categorie/{category}', [CategoryController::class,'show']);

Route::get('/contact', [ContactController::class,'create'])->middleware('auth');

Route::post('/contact', [ContactController::class,'store']);

Route::get('/Admin', [AdminController::class, 'index'])->middleware('auth');

Route::get('/Admin/Produit', [AdminProductController::class, 'index'])->middleware('auth');

Route::get('/Admin/Produit/creer', [AdminProductController::class,'create'])->middleware('auth');

Route::post('/Admin/Produit/creer', [AdminProductController::class, 'store'] )->middleware('auth');

Route::get('/Admin/Produit/{produit}', [AdminProductController::class, 'edit'])->middleware('auth');

Route::put('/Admin/Produit/{produit}', [AdminProductController::class, 'update'])->middleware('auth');

Route::DELETE('/Admin/Produit/{produit}', [AdminProductController::class, 'destroy'])->middleware('auth');

Route::get('/Admin/Category', [AdminCategoryController::class, 'index']);

Route::get('/Admin/Category/creer', [AdminCategoryController::class,'create']);

Route::post('/Admin/Category/creer', [AdminCategoryController::class, 'store'] );

Route::get('/Admin/Category/{Category}/modifier', [AdminCategoryController::class, 'edit']);

Route::put('/Admin/Category/{Category}', [AdminCategoryController::class, 'update']);

Route::DELETE('/Admin/Category/{Category}', [AdminCategoryController::class, 'destroy']);

Route::post('commentaire/{product}', [CommentController::class, 'store'] )->middleware('auth');

Route::get('/panier', [CartController::class, 'index'])->middleware('auth');

Route::post('/panier/{product}', [CartController::class,'store'])->middleware('auth'); 

Route::delete('/panier/{product}', [CartController::class, 'destroy']);

Route::get('/Orderasc', [OrderController::class, 'asc']);

Route::get('/Orderdesc', [OrderController::class, 'desc']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/Admin', function () {
      return view('Admin.index');
    })->name('index');
  });