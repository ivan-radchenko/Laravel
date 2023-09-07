<?php

namespace App\Services;

use App\Models\Rss;
use App\Models\RssNews;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\NoReturn;
use Orchestra\Parser\Xml\Facade as XmlParserData;

class ParserService implements Parser

{
    private string $link;

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    #[NoReturn] public function saveParseData(): void
    {
        $parser = XmlParserData::load($this->link);

        $data = $parser->parse([
            "news" => [
                "uses" => "channel.item[title,link,description,pubDate,author,category]"
            ]
        ]);


        foreach ($data['news'] as $item){
            $newData = new RssNews($item);
            $newData->save();
        };


/*        $explode = explode('/',$this->link);
        $fileName = end($explode);

        Storage::append('parser/' . $fileName . "json" , json_encode($data));*/
    }
}
