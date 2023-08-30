<?php

namespace App\Http\Controllers;

use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParserData;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Parser $parser)
    {
        $url = "https://news.rambler.ru/rss/community/";

        $parser->setLink($url)->saveParseData();
    }
}
