<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData(): array
    {
        $categories = [];
        $quantityCategories = 5;
        for ($i = 0; $i <= $quantityCategories; $i++) {
            $categories[]=[
                'name'=>fake()->word,
                'description' => fake()->realTextBetween(100,120),
                'created_at' => now()
            ];
        }
        return $categories;
    }
}
