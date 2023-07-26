<?php

namespace Database\Seeders;

use App\Enums\News\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class News extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData():array

    {
        $news = [];
        $quantityNews = 20;

        for ($i = 0; $i <= $quantityNews; $i++) {
            $news[] = [
                'category_id' => fake()->numberBetween(1, 6),
                'title' => fake()->realTextBetween(5,10),
                'author' => fake()->userName(),
                'image' => fake()->imageUrl(300,200),
                'status' => Status::ACTIVE->value,
                'description' => fake()->realTextBetween(100,120),
                'source_id' => fake()->numberBetween(1, 10),
                'created_at' => now()
            ];
        }
        return $news;
    }
}
