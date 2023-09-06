<?php

namespace App\Http\Controllers;

use App\Jobs\NewsParsing;
use App\Models\Rss;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParserData;

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

        return "Data saved";
    }
}
