<?php
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\NewsController;
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

Route::get('/', function () {
    return view('welcome');
});

//Admin
//общие страницы
Route::get('/admin', AdminController::class)
    ->name('admin.index');

Route::get('/admin/categories', [AdminCategoryController::class,'index'])
    ->name('admin.categories');
Route::get('/admin/news', [AdminNewsController::class, 'index'])
    ->name('admin.news');
//добавление новости
Route::get('/admin/news/create', [AdminNewsController::class, 'create'])
    ->name('admin.news.create');
Route::post('/admin/news/create', [AdminNewsController::class, 'store'])
    ->name('admin.news.store');
//добавление категории
Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])
    ->name('admin.categories.create');
Route::post('/admin/categories/create', [AdminCategoryController::class, 'store'])
    ->name('admin.categories.store');

//главная страница приветствия
Route::get('/', function () {
    return view('main');
});

//новости
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

//категории новостей
Route::get('/news/categories', [NewsController::class, 'categories'])
    ->name('news.categories');
Route::get('/news/category/{id}', [NewsController::class, 'showCategory'])
    ->where('id', '\d+')
    ->name('news.showCategory');

//выгрузка новостей
Route::get('/news/uploading', [NewsController::class, 'uploading'])
    ->name('news.uploading');
Route::post('/news/uploading', [NewsController::class, 'uploadingStore'])
    ->name('news.uploading.store');
