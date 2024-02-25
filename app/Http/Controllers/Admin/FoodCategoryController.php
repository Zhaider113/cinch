<?php

namespace App\Http\Controllers\Admin;

use App\Models\FoodCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = FoodCategory::with('category')->orderBy('id', 'desc')->get();
        $categories = Category::get();
        return view('admin.food.index', compact('foods','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.food.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foods = new FoodCategory;
        $foods->category_id  = $request->category_id;
        $foods->title = $request->title;
        
        $foods->save();       
        return back()->with('message','Food Category Add successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $food = FoodCategory::where('id', $id)->first();

            if(empty($food))
            {
                return back()->with('error', 'Food Category does not Exists');
            }

            $food->delete();

            return back()->with('message', 'Food Category Deleted.....!');
        }catch(\Exception $e)
        {
            return back()->with('error', 'There is some trouble to proceed your action');
        }
    }
}
