<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodCourse;
use App\Models\FoodCategory;
use App\Http\Requests\StoreFoodCourseRequest;
use App\Http\Requests\UpdateFoodCourseRequest;
use Illuminate\Http\Request;
use DB;

class FoodCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $courses = FoodCourse::get();
            foreach($courses as $course){
                $category = FoodCategory::where('id', $course->food_id)->first();
                $course->category = $category->title;
            }
            
            $categories = FoodCategory::get();
            return view('admin.courses.index', compact('courses','categories'));
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
        
        
        $course = new FoodCourse;
        $course->food_id  = $request->food_id;
        $course->title = $request->title;
        $course->description = $request->description;

        if($request->has('video'))
        {
            if($request->video->getClientOriginalExtension() == 'mpeg'||
                $request->video->getClientOriginalExtension() == 'ogg'||
                $request->video->getClientOriginalExtension() == 'mp4' ||
                $request->video->getClientOriginalExtension() == 'webm'|| 
                $request->video->getClientOriginalExtension() == '3gp' ||
                $request->video->getClientOriginalExtension() == 'flv' ||
                $request->video->getClientOriginalExtension() == 'wmv' ||
                $request->video->getClientOriginalExtension() == 'avi' ||
                $request->video->getClientOriginalExtension() == 'mov')
            {
                $newfilename = md5(mt_rand()) .'.'. $request->video->getClientOriginalExtension();
                $request->file('video')->move(public_path("/uploads"), $newfilename);
                $new_path1 = 'uploads/'.$newfilename;
                $course->video = $new_path1;
    
            }else{
                return back()->with('error', 'Choose a Valid Video');
            }                       
        }
        
        $course->save();       
        return back()->with('message','Course Add successfully');      
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
            $course = FoodCourse::find($id);

            if(empty($course))
            {
                return back()->with('error', 'Course does not Exists!');
            }            

            $course->delete();

            return back()->with('message', 'Course  Deleted');

        }catch(\Exception $e)
        {
            return back()->with('error', 'There is some trouble to proceed your action!');
        }
    }
}
