<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\order;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    //метод выводящий все новости
    public function index(): View
    {
        return \view('news.index',['newsList'=>News::All()]);
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
        $categories = Category::all();
        $sources = Source::all();

        return \view('news.uploading',[
            'categories' => $categories,
            'sources'=>$sources,
        ]);
    }

    public function uploadingStore(Request $request)
    {
        $data = $request->only(['customer','phone','email','category_id','source_id','description']);

        $order = new order($data);
        if ($order->save()){
            return redirect('/')->with('success','заказ на выгрузку новостей создан');
        }
        return back()->with('error','ошибка создания заказа');
    }
}
