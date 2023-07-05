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
            'category' => fake()->numberBetween(1, 6),
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
                    'category' => fake()->numberBetween(1, 6),
                    'title' => fake()->jobTitle(),
                    'author' => fake()->userName(),
                    'image' => fake()->imageUrl(300,200),
                    'status' => 'ACTIVE',
                    'description' => fake()->text(200),
                    'created_at' => now()->format('d-m-y h:i')
                ];
            }
            return $news;
    }
    public function getCategories(int $id = null): array
    {
        if ($id !== null) {
        return [
            'id'=>$id,
            'name'=>fake()->word
        ];
    }
        $categories = [];
        $quantityCategories = 5;
            for ($i = 0; $i <= $quantityCategories; $i++) {
                $categories[]=[
                    'id' => ($i === 0) ? ++$i : $i,
                    'name'=>fake()->word
                ];
            }
            return $categories;
    }
}
