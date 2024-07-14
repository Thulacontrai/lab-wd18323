<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;

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
Route::get('/list', [ProductController::class, 'index']);
Route::get('contact', [ProductController::class, 'contact']);
Route::get('ct/{id}/{name}/{price}', [ProductController::class, 'detalPro']);

Route::resource('product', ProductController::class);






//// LAB 1,2
Route::get('/', function () {
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
})->name('home');
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





