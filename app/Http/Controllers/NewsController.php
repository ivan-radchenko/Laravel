<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    //метод выводящий все новости
    public function index(): View
    {
        $news = app(News::class);

        return \view('news.index',['newsList'=>$news ->getAll()]);
    }

    //метод выводящий конкретную новость по id
    public function show(int $id): View
    {
        $news = app(News::class);

        return \view('news.show',['news'=>$news ->getItemById($id)]);
    }

    //метод выводящий все категории
    public function categories():View
    {
        $categories = app(Category::class);

        return \view('news.categories', ['categoriesList'=> $categories->getAll()]);
    }

    //метод выводящий новости из конкретной категории
    public function showCategory(int $id): View
    {
        $news = app(News::class);
        $categories = app(Category::class);
        return \view('news.showCategory', ['categories'=> $categories->getCategoryById($id)],['newsList'=>$news ->getAll()]);
    }

    //метод выводящий страницу выгрузки
    public function uploading():View
    {
        return \view('news.uploading');
    }

    public function uploadingStore(Request $request)
    {
        return response() ->json($request->all());
    }
}
