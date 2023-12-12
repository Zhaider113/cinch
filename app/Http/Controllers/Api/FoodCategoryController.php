<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\FoodCategory;
use App\Models\FoodCourse;

class FoodCategoryController extends Controller
{
    public function index(){
        try {
            $foodCategories = FoodCategory::get();
            return $this->success([sizeof($foodCategories) > 0 ? 'Category Found' : 'No Category Found', $foodCategories]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    // get courses specific categories
    public function foodCourses(string $id){
        try {
            $course = FoodCourse::where('food_id',$id)->orderBy('views', 'desc')->get();
            return $this->success([sizeof($course) > 0 ? 'Course Found' : 'No Course Found', $course]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    // get specific courses
    public function viewCourse(string $id){
        try {
            $course = FoodCourse::find($id);
            $course->views = $course->views+1;
            $course->save();
            return $this->success([$course->count()  > 0 ? 'Course Found' : 'No Course Found', $course]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function popularCourses(string $id){
        try {
            $course = FoodCourse::where('food_id',$id)->orderBy('views', 'desc')->limit(4)->get();
            return $this->success([sizeof($course) > 0 ? 'Course Found' : 'No Course Found', $course]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function allPopularCourses(string $id){
        try {
            $course = FoodCourse::orderBy('views', 'desc')->get();
            return $this->success([sizeof($course) > 0 ? 'Course Found' : 'No Course Found', $course]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
