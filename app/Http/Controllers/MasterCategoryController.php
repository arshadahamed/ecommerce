<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function storecat(Request $request)
    {
        // Validate the incoming request data
        $validate_data = $request->validate([
            'category_name' => 'required|unique:categories|max:100|min:5',
        ]);

        // Create a new category
        Category::create([
            'category_name' => $validate_data['category_name'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Category Added Successfully');

    }

    public function showcat($id) {
        $category_info = Category::find($id);
        return view('admin.category.edit', compact('category_info'));
    }
    public function updatecat(Request $request, $id) {
        $category = Category::findOrFail($id);
        $validate_data = $request->validate([
            'category_name' => 'required|unique:categories|max:100|min:5',
        ]);
        $category->update($validate_data);
        return redirect()->back()->with('message', 'Category Updated Successfully');
    }

    public function deletecat($id){
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
}
