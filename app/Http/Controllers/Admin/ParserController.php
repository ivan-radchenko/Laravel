<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Rss;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        $urls=Rss::all('url');
        foreach ($urls as $url) {

            dispatch(new NewsParsing($url->url));
        }

        return redirect()->route('admin.rss')->with('success',('Задача парсинга добавлена вочередь'));
    }
}
