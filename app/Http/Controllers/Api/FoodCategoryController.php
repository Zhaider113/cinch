<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\FoodCategory;
use App\Models\FoodCourse;
use App\Models\Recipes;

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
            $course = FoodCourse::where('food_id',$id)->orderBy('views', 'desc')->get();
            return $this->success([sizeof($course) > 0 ? 'Course Found' : 'No Course Found', $course]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    
    public function recipes(){
        try {
            $recipes = Recipes::orderBy('id', 'desc')->get();
            foreach($recipes as $recipe){
                $category = FoodCategory::where('id', $recipe->food_id)->first();
                $recipe->category_name = $category->title;
            }
            return $this->success([sizeof($recipes) > 0 ? 'Recipes Found' : 'No Recipe Found', $recipes]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
    
    public function recipe_details($id){
        try {
            $recipe = Recipes::where('id',$id)->first();
            $category = FoodCategory::where('id', $recipe->food_id)->first();
            $recipe->category_name = $category->title;
            
            return $this->success([!empty($recipe) > 0 ? 'Recipes Details Found' : 'No Recipe Details Found', $recipe]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
