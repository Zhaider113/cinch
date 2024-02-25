<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipes;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use DB;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $recipes = Recipes::get();
            foreach($recipes as $recipe){
                $category = FoodCategory::where('id', $recipe->food_id)->first();
                $recipe->category = $category->title;
            }
            
            $categories = FoodCategory::get();
            return view('admin.recipes.index', compact('recipes','categories'));
        } catch (\Throwable $th) {
            return back()->with('error', 'There is some trouble to proceed your action');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreFoodCourseRequest $request)
    // {
        //
    // }
    public function store(Request $request)
    {
        
        
        $recipe = new Recipes;
        $recipe->food_id  = $request->food_id;
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->time_to_prepare = $request->time_to_prepare;
        
        if($request->has('image'))
        {
            if($request->image->getClientOriginalExtension() == 'PNG' ||$request->image->getClientOriginalExtension() == 'png' || $request->image->getClientOriginalExtension() == 'JPG' || $request->image->getClientOriginalExtension() == 'jpg' || $request->image->getClientOriginalExtension() == 'jpeg' || $request->image->getClientOriginalExtension() == 'JPEG')
            {
                $newfilename = md5(mt_rand()) .'.'. $request->image->getClientOriginalExtension();
                $request->file('image')->move(public_path("/uploads"), $newfilename);
                $new_path1 = 'uploads/'.$newfilename;
                $recipe->image = $new_path1;
    
            }else{
                return back()->with('error', 'Choose a Valid Image');
            }                       
        }
        
        $recipe->save();       
        return back()->with('message','Recipe Add successfully');      
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodCourse $foodCourse)
    {
        //
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodCourse $foodCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodCourseRequest $request, FoodCourse $foodCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         try{
            $recipe = Recipes::find($id);

            if(empty($recipe))
            {
                return back()->with('error', 'Recipe does not Exists!');
            }            

            $recipe->delete();

            return back()->with('message', 'Recipe  Deleted');

        }catch(\Exception $e)
        {
            return back()->with('error', 'There is some trouble to proceed your action!');
        }
    }
}