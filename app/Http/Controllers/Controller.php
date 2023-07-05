<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    //временно формируем массив данных
    public function getNews(int $id=null): array
    {
        if ($id !== null) {
        return [
            'id' => $id,
            'title' => fake()->title(),
            'author' => fake()->userName(),
            'image' => fake()->imageUrl(300,200),
            'status' => 'ACTIVE',
            'description' => fake()->text(200),
            'created_at' => now()->format('d-m-y h:i')
        ];
    }
        $news = [];
        $quantityNews = 20;

            for ($i = 0; $i <= $quantityNews; $i++) {
                $news[] = [
                    'id' => ($i === 0) ? ++$i : $i,
                    'title' => fake()->jobTitle(),
                    'author' => fake()->userName(),
                    'image' => fake()->imageUrl(300,200),
                    'status' => 'ACTIVE',
                    'description' => fake()->text(200),
                    'created_at' => now()->format('d-m-y h:i')
                ];
            };
            return $news;
        }
}
