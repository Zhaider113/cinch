<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'title' => 'Fasting',
            'start_time' => '07:00 AM',
            'end_time' => '12:00 PM'
        ]);
        Category::create([
            'title' => 'Lunch',
            'start_time' => '12:00 PM',
            'end_time' => '03:00 PM'
        ]);
        Category::create([
            'title' => 'Dinner',
            'start_time' => '08:00 PM',
            'end_time' => '12:00 PM'
        ]);
    }
}
