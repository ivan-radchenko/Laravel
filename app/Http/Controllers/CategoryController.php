<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    //метод выводящий все категории
    public function index(): View
    {
        return \view('news.categories', ['categories' => Category::All()]);
    }


    public function show(Category $categories)
    {
        return \view('news.showCategory', ['categories' => $categories], ['newsList' => News::All()]);
    }

}
