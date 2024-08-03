<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminController;
use App\Models\Movie;


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
})->name('home');
Route::get('/list', [ProductController::class, 'index']);
Route::get('contact', [ProductController::class, 'contact']);
Route::get('ct/{id}/{name}/{price}', [ProductController::class, 'detalPro']);

Route::resource('product', ProductController::class);






//// LAB 1,2
Route::get('/listbook', function () {
    $sp_price_min = DB::table('books')
        ->orderBy('price', 'asc')
        ->limit(8)
        ->get();
    $sp_price_max = DB::table('books')
        ->orderBy('price', 'desc')
        ->limit(8)
        ->get();
    // dd($sp_price_min,$sp_price_max);
    return view('clien.home', compact('sp_price_min', 'sp_price_max'));
});
Route::get('detail/{id}', function (string $id) {
    $book = DB::table('books')->where('id', $id)->first();
    //   dd($book);
    return view('clien.detail', compact('book'));
})->name('detail');

Route::get('book-cate/{cate_id}', function (string $cate_id) {
    $books = DB::table('books')
        ->join('categories', 'category_id', '=', 'categories.id')
        ->where('category_id', $cate_id)
        ->paginate(12);
    $cate = DB::table('categories')->where('categories.id', $cate_id)->first();
    // dd($cate);
    return view('clien.bookbycate', compact('books', 'cate'));
})->name('book-cate');


///Lab 3
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('book', BookController::class);

});



///// LAB 5



Route::prefix('admin')->group(function () {
    Route::resource('movie',MovieController::class);
    Route::prefix('movie')
    ->group(function () {
    Route::post('search', [MovieController::class,'search'])->name('movie.search');
    Route::get('genreFilter/{id}',[MovieController::class,'genreFilter'])->name('movie.genreFilter');
});
});

////lab 6
Route::prefix('clien')->group(function () {
    Route::resource('movie',MovieController::class);
    Route::prefix('movie')
    ->group(function () {
    Route::post('search', [MovieController::class,'search'])->name('movie.search');
    Route::get('genreFilter/{id}',[MovieController::class,'genreFilter'])->name('movie.genreFilter');
});
});


Route::get('login',[AuthController::class,'formLogin'])->name('login');
Route::post('login',[AuthController::class,'subLogin']);

Route::get('register',[AuthController::class,'formRegister'])->name('register');
Route::post('register',[AuthController::class,'subRegister']);

Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function (){
    Route::get('profile',[AuthController::class,'showProfile'])->name('profile');
    Route::get('editProfile/{user}',[AuthController::class,'editProfile'])->name('editProfile');
    Route::put('subProfile',[AuthController::class,'subProfile'])->name('subProflie');
});




Route::middleware(['auth'])
    ->prefix('admin')
    ->group(function (){
        Route::get('home',[\App\Http\Controllers\AdminController::class,'home'])->name('admin.home');
        Route::get('onAccount/{user}',[\App\Http\Controllers\AdminController::class,'onAccount'])->name('admin.onAccount');
        Route::get('offAccount/{user}',[\App\Http\Controllers\AdminController::class,'offAccount'])->name('admin.offAccount');

});














