<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryTip;
use App\Models\UserCategories;
use Auth;
use Carbon\Carbon;

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
    public function show(Request $request)
    {
        try {
            $user_id = $request->user_id;
            $category = Category::find($request->category_id);
            $userCat = UserCategories::where('category_id', $category->id)->where('user_id', $user_id)->first();
            if($userCat){
                $categoryTips = CategoryTip::where('category_id', $category->id)->orderBy('views', 'desc')->get();
                return $this->success([$category->count() > 0 ? 'Category Found' : 'No Category Found', ["item"=>$userCat, "tips"=>$categoryTips]]);
            }else{
                $hoursToAdd = (int) str_replace(' hours', '', $category->feeding_window);

                $userCat = new UserCategories;
                $userCat->user_id = $user_id;
                $userCat->category_id = $request->category_id;
                $userCat->start_time = Carbon::now()->format('h:i A');
                $userCat->end_time = Carbon::now()->addHours($hoursToAdd)->format('h:i A');

                $userCat->save();
                $categoryTips = CategoryTip::where('category_id', $category->id)->orderBy('views', 'desc')->get();
                return $this->success([$category->count() > 0 ? 'Category Found' : 'No Category Found', ["item"=>$userCat, "tips"=>$categoryTips]]);
            }
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

    public function updateUserCategory(Request $request){
        try {
            $userCat = UserCategories::where('id', $request->id)->first();
            if(empty($userCat))
            {
                return $this->error('Post not found');
            }
            $userCat->start_time = Carbon::parse($request->start_time)->format('h:i A');
            $userCat->end_time = Carbon::parse($request->end_time)->format('h:i A');
            $userCat->save();
            return $this->success(['Time Updated']);
        } catch (\Throwable $th) {
            return $this->error($th->getMessage());
        }
    }
}
