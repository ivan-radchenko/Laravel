<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    //метод выводящий все новости
    public function index(): View
    {
        return \view('news.index',['newsList'=>$this ->getNews()]);
    }

    //метод выводящий конкретную новость по id
    public function show(int $id): View
    {
        return \view('news.show',['news'=>$this ->getNews($id)]);
    }

    //метод выводящий все категории
    public function categories():View
    {
        return \view('news.categories', ['categoriesList'=> $this->getCategories()]);
    }

    //метод выводящий новости из конкретной категории
    public function showCategory(int $id): View
    {
        return \view('news.showCategory', ['categories'=> $this->getCategories($id)],['newsList'=>$this ->getNews()]);
    }

    //метод выводящий страницу выгрузки
    public function uploading():View
    {
        return \view('news.uploading');
    }

    public function uploadingStore(Request $request)
    {
        dd($_REQUEST);
    }
}
