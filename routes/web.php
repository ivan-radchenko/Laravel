<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\OrdersController as AdminOrderController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\RssController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialProvidersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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


//главная страница приветствия
Route::get('/', function () {
    return view('main');
});

//новости
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/show/{news}', [NewsController::class, 'show'])
    ->name('news.show');
Route::get('/news/rss/', [NewsController::class, 'rss'])
    ->name('news.rss');

//категории новостей
Route::get('/news/categories', [CategoryController::class, 'index'])
    ->name('news.categories');
Route::get('/news/category/{categories}', [CategoryController::class, 'show'])
    ->name('news.showCategory');

//выгрузка новостей
Route::get('/news/uploading', [NewsController::class, 'uploading'])
    ->name('news.uploading');
Route::post('/news/uploading', [NewsController::class, 'uploadingStore'])
    ->name('news.uploading.store');




// Guests routes

Route::group(['middleware' => 'guest'], function () {
    Route::get('/{driver}/redirect', [SocialProvidersController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social-providers.redirect');

    Route::get('/{driver}/callback', [SocialProvidersController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social-providers.callback');
});

//авторизация
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::group(['middleware'=>'auth',],function (){
    //аккаунт
    Route::get('/account',[AccountController::class,'index'])
        ->name('account');
    Route::put('/account/{user}',[AccountController::class,'update'])
        ->name('account.update');
    Route::put('/account/{user}/password/',[AccountController::class,'updatePassword'])
        ->name('account.update.password');

    //Admin
    Route::group(['middleware'=>'is_admin',],function () {
//общие страницы
        Route::get('/admin', AdminController::class)
            ->name('admin.index');

        Route::get('/admin/categories', [AdminCategoryController::class, 'index'])
            ->name('admin.categories');

        Route::get('/admin/news', [AdminNewsController::class, 'index'])
            ->name('admin.news');

        Route::get('/admin/accounts',[App\Http\Controllers\Admin\AccountsController::class,'index'])
            ->name('admin.accounts');

        Route::get('/admin/rss',[App\Http\Controllers\Admin\RssController::class,'index'])
            ->name('admin.rss');
//добавление новости
        Route::get('/admin/news/create', [AdminNewsController::class, 'create'])
            ->name('admin.news.create');
        Route::post('/admin/news/create', [AdminNewsController::class, 'store'])
            ->name('admin.news.store');
//изменение новости
        Route::get('/admin/news/edit/{news}', [AdminNewsController::class, 'edit'])
            ->name('admin.news.edit');
        Route::put('/admin/news/edit/{news}', [AdminNewsController::class, 'update'])
            ->name('admin.news.update');
//удаление новости
        Route::delete('/admin/news/{news}', [AdminNewsController::class, 'destroy'])
            ->name('admin.news.delete');

//добавление категории
        Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])
            ->name('admin.categories.create');
        Route::post('/admin/categories/create', [AdminCategoryController::class, 'store'])
            ->name('admin.categories.store');
//изменение категории
        Route::get('/admin/categories/edit/{categories}', [AdminCategoryController::class, 'edit'])
            ->name('admin.categories.edit');
        Route::put('/admin/categories/edit/{categories}', [AdminCategoryController::class, 'update'])
            ->name('admin.categories.update');
//удаление категории
        Route::delete('/admin/categories/{categories}', [AdminCategoryController::class, 'destroy'])
            ->name('admin.categories.delete');


//выгрузка новостей
        Route::get('/admin/orders', [AdminOrderController::class, 'index'])
            ->name('admin.orders');
        Route::get('/admin/orders/edit/{orders}', [AdminOrderController::class, 'edit'])
            ->name('admin.orders.edit');
        Route::put('/admin/orders/edit/{orders}', [AdminOrderController::class, 'update'])
            ->name('admin.orders.update');
//удаление заказа
        Route::delete('/admin/orders/{orders}', [AdminOrderController::class, 'destroy'])
            ->name('admin.orders.delete');

//пользователи
        Route::get('/admin/accounts/edit/{user}',[App\Http\Controllers\Admin\AccountsController::class,'edit'])
            ->name('admin.accounts.edit');
        Route::put('/admin/accounts/edit/{user}',[App\Http\Controllers\Admin\AccountsController::class,'update'])
            ->name('admin.accounts.update');
        Route::put('/admin/accounts/edit/{user}/password',[App\Http\Controllers\Admin\AccountsController::class,'updatePassword'])
            ->name('admin.accounts.update.password');
        Route::delete('/admin/accounts/{user}',[App\Http\Controllers\Admin\AccountsController::class,'destroy'])
            ->name('admin.accounts.delete');

//parser
        Route::get('/admin/parser',[ParserController::class,'index'])
            ->name('parser');

//RSS
        Route::get('/admin/rss/edit/{rsses}',[RssController::class,'edit'])
            ->name('admin.rss.edit');
        Route::put('/admin/rss/edit/{rsses}',[RssController::class,'update'])
            ->name('admin.rss.update');
        Route::get('/admin/rss/create', [RssController::class, 'create'])
            ->name('admin.rss.create');
        Route::post('/admin/rss/create', [RssController::class, 'store'])
            ->name('admin.rss.store');
        Route::delete('/admin/rss/{rsses}',[RssController::class,'destroy'])
            ->name('admin.rss.delete');

//файловый менеджер
        Route::group(['prefix' => 'laravel-filemanager',], function () {
            Lfm::routes();
        });
    });
});
