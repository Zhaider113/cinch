<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FoodCategory;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodCategory::create([
            'title' => 'Fasting',
            'category_id' => 1,
        ]);
        FoodCategory::create([
            'title' => 'Food',
            'category_id' => 2,
        ]);
        FoodCategory::create([
            'title' => 'Health',
            'category_id' => 3,
        ]);
        FoodCategory::create([
            'title' => 'Training',
            'category_id' => 2,
        ]);
    }
}
