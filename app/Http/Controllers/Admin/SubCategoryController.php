<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        $subcategories = Subcategory::with('category')->get(); // Fetch with the category relationship if needed

        return view('admin.subcategory.create', compact('subcategories','categories'));
    }

    public function manage() {
        $subcategories = Subcategory::all();
        return view('admin.subcategory.manage',compact('subcategories'));
    }
}
