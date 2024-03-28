<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTip;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::get();
            return $this->success([sizeof($categories) > 0 ? 'Category Found' : 'No Category Found', $categories]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

     /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $category = Category::find($id);
            $categoryTips = CategoryTip::where('category_id', $category->id)->orderBy('views', 'desc')->get();
            return $this->success([$category->count() > 0 ? 'Category Found' : 'No Category Found', ["item"=>$category, "tips"=>$categoryTips]]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    /**
     * Display the specified Tip.
     */
    public function viewTip(string $id)
    {
        try {
            $tip = CategoryTip::find($id);
            $tip->views = $tip->views+1;
            $tip->save();
            return $this->success([$tip->count() > 0 ? 'Tip Found' : 'No Tip Found', $tip]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }

    public function update_time(Request $request)
    {
        $userCategory = UserCategories::where('category_id', $request->id)->where('user_id', Auth::user()->id)->first();
        $userCategory->title  = $request->id;
        $userCategory->start_time = $request->start_time;
        $userCategory->end_time = $request->end_time;
        $userCategory->save();  
        
        return back()->with('message','User Category updated successfully'); 
    }
}
