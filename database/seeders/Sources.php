<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sources extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sources')->insert($this->getData());
    }

    public function getData(): array
    {
        $sources = [];
        $quantitySources = 10;
        for ($i = 0; $i <= $quantitySources; $i++) {
            $sources[]=[
                'source'=>fake()->word,
                'created_at' => now()
            ];
        }
        return $sources;
    }
}
