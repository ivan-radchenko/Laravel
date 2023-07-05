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

Route::get('/', function () {
    return view('welcome');
});

//страница приветствия ползователей
Route::get('/hello', function () {
    return  "Welcome to Laravel";
});

//Страница с информацией о проекте.
Route::get('/info', function () {
    return  "This project created in 2023";
});

//Страница для вывода новостей
Route::get('/news/{id}', static function (string $news_id) {
    return  "Новость с id: $news_id";
});
