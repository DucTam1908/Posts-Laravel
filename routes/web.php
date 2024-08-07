<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Auth\AuthenController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Middleware\IsAdmin;
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
//     return view('clien');
// });




// Client
Route::get('/', [HomeController::class, 'index']);

Route::get('/index', [HomeController::class, 'index'])->name('index');
Route::get('/category/{id}', [CategoryController::class, 'showCate'])->name('showCate');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/account', [HomeController::class, 'account'])->name('account');



//Admin 

Route::prefix('admin')
    ->as('admin.')
    ->group(function () {

        Route::get('/', [NewsController::class, 'index'])->name('dashboard')->middleware(['auth', IsAdmin::class]);

        Route::prefix('categories')
            ->as('categories.')
            ->group(function () {
                Route::get('/', [CategoriesController::class, 'index'])->name('list');
                Route::get('/create', [CategoriesController::class, 'create'])->name('create');
                Route::post('/store', [CategoriesController::class, 'store'])->name('store');
                Route::get('/show/{id}', [CategoriesController::class, 'show'])->name('show');
                Route::get('/edit/{id}', [CategoriesController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [CategoriesController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [CategoriesController::class, 'destroy'])->name('destroy');
            });

        Route::prefix('posts')
            ->as('posts.')
            ->group(function () {
                Route::get('/', [PostsController::class, 'index'])->name('list');
                Route::get('/create', [PostsController::class, 'create'])->name('create');
                Route::post('/store', [PostsController::class, 'store'])->name('store');
                Route::get('/show/{id}', [PostsController::class, 'show'])->name('show');
                Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('edit');
                Route::put('/update/{id}', [PostsController::class, 'update'])->name('update');
                Route::delete('/destroy/{id}', [PostsController::class, 'destroy'])->name('destroy');
            });
    });

// Login, register, forgot

Route::get('register', [AuthenController::class, 'register'])->name('register');
Route::post('register', [AuthenController::class, 'handleRegister']);

Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login', [AuthenController::class, 'handleLogin']);


Route::get('password/forgot', [ForgotPasswordController::class, 'ShowFromForgot'])->name('forgot');
Route::post('password/forgot', [ForgotPasswordController::class, 'SendEmailPasss']);
// reset mật khẩu
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::put('password/update', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::post('logout', [AuthenController::class, 'logout'])->name('logout');
