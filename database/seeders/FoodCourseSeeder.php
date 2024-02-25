<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FoodCourse;

class FoodCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FoodCourse::create([
            'title' => 'How to eat Better While fasting',
            'food_id' => 1,
            'video' => "uploads/video1.mp4",
            'description' => "These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of. These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of",
        ]);
        FoodCourse::create([
            'title' => 'How to eat Better While fasting',
            'food_id' => 2,
            'video' => "uploads/video1.mp4",
            'description' => "These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of. These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of",
        ]);
        FoodCourse::create([
            'title' => 'How to eat Better While fasting',
            'food_id' => 3,
            'video' => "uploads/video1.mp4",
            'description' => "These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of. These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of",
        ]);
        FoodCourse::create([
            'title' => 'How to eat Better While fasting',
            'food_id' => 2,
            'video' => "uploads/video1.mp4",
            'description' => "These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of. These 8 practical tips cover the basics of healthy eating and can help you make healthier choices. The key to a healthy diet is to eat the right amount of",
        ]);
    }
}
