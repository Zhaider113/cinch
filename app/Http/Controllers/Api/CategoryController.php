<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTip;

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
            $categoryTips = CategoryTip::where('category_id', $category->id)->get();
            return $this->success([$category->count() > 0 ? 'Category Found' : 'No Category Found', [$category, $categoryTips]]);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
