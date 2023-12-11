<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\CategoryTip;
use App\Models\FoodCategory;

class AdminNavigationController extends Controller
{
    public function dashboard(Request $request)
    {
        $verified_users = User::where('type', '1')->where('is_verified', '1')->count();
        $users = User::where('type', '1')->where('is_verified', '0')->get();
        $category = Category::get();
        $categoryTips = CategoryTip::get();
        $foodCategory = FoodCategory::get();
        return view('admin.dashboard', compact(['users', 'verified_users', 'category', 'categoryTips', 'foodCategory']));
    }  
}
