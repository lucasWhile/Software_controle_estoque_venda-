<?php

use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usuarioController;

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

Route::get('/create/new/user', function () {
    return view('users.formsNewUser');
})->name('create.user');


Route::get('/', function () {
    return view('users.loginUser');
})->name('login.user');


Route::get('/index', function () {
    return view('users.index');
});


Route::get('/list/users',[usuarioController::class, 'listUser'])->name('list.user');

Route::get('/change/users/level',[usuarioController::class, 'changelevelUser'])->name('change.level.user');

Route::get('/delete/users/{id}',[usuarioController::class, 'deleteUser'])->name('delete.user');

//get

Route::get('/cadastro/user/data', [usuarioController::class, 'create'])->name('user.data');


Route::get('/index/produto', [productController::class, 'index'])->name('produto.index');


Route::get('/new/product', function () {
    return view('produto.formsNewProduct');
})->name('create.product');

//salvar o produto

Route::post('data/new/product',[productController::class,'create'])->name('product.data');

Route::get('/login/user/data', [usuarioController::class, 'auth'])->name('user.auth');



//registrar venda
Route::get('register/sale/{id}',[productController::class,'registerSale'])->name('register.sale');



Route::get('user/data/',[usuarioController::class,'user_data'])->name('user.myperfil');

Route::get('user/logout/',[usuarioController::class,'logout'])->name('user.logout');


Route::get('list/product/',[productController::class,'ListProduct'])->name('list.product');


Route::get('drop/product/{id}',[productController::class,'dropProduct'])->name('drop.product');

Route::get('edit/product/{id}',[productController::class,'editProduct'])->name('edit.product');

Route::Post('save/edit/product/{id}',[productController::class,'SaveEditProduct'])->name('save.edit.product');