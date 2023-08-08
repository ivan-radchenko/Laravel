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
    public function show(News $news)
    {
        return \view('news.show',['news'=>$news]);
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
