<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class MasterSubcategoryController extends Controller
{
     // Method to show the create subcategory form
     public function create()
     {
         // Fetch all categories to populate the dropdown
         $categories = Category::all();

         return view('admin.subcategory.create', compact('categories'));
     }

     public function storesubcat(Request $request)
     {
         // Validate the incoming request data
         $validate_data = $request->validate([
             'subcategory_name' => 'required|unique:subcategories|max:100|min:5',
             'category_id' => 'required|exists:categories,id',
         ]);

         // Create a new subcategory
         Subcategory::create($validate_data);

         // Redirect back with a success message
         return redirect()->back()->with('message', 'Sub Category Added Successfully');
     }

     public function showsubcat($id)
     {
         $subcategory_info = Subcategory::findOrFail($id); // Make sure to handle null cases
         $categories = Category::all(); // Fetch all categories to populate the dropdown

         return view('admin.subcategory.edit', compact('subcategory_info', 'categories'));
     }

     public function updatesubcat(Request $request, $id)
     {
         $category = Subcategory::findOrFail($id);

         // Validate both subcategory_name and category_id
         $validate_data = $request->validate([
             'subcategory_name' => 'required|unique:subcategories,subcategory_name,' . $id . '|max:100|min:5', // Adjust for unique validation
             'category_id' => 'required|exists:categories,id', // Ensure the category exists
         ]);

         // Update the subcategory with both subcategory_name and category_id
         $category->update([
             'subcategory_name' => $validate_data['subcategory_name'],
             'category_id' => $request->category_id, // Update the category_id
         ]);

         return redirect()->back()->with('message', 'Sub Category Updated Successfully');
     }

     public function deletesubcat($id)
     {
         Subcategory::findOrFail($id)->delete();
         return redirect()->back()->with('message', 'Sub Category Deleted Successfully');
     }
}
