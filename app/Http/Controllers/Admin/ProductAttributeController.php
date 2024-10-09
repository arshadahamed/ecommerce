<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index() {
        return view('admin.product_attribute.create');
    }

    public function manage() {
        $attributes = DefaultAttribute::all();
        return view('admin.product_attribute.manage',compact('attributes'));
    }
    public function create(Request $request) {
        // Validate the incoming request data
        $validate_data = $request->validate([
            'attribute_name' => 'required|unique:default_attributes|max:100|min:1',
        ]);

        // Create a new category
        DefaultAttribute::create([
            'attribute_name' => $validate_data['attribute_name'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Product Attribute Added Successfully');

    }

    public function show($id) {
        $attribute_info = DefaultAttribute::find($id);
        return view('admin.product_attribute.edit', compact('attribute_info'));
    }

    public function update(Request $request, $id) {
        $attribute = DefaultAttribute::findOrFail($id);
        $validate_data = $request->validate([
            'attribute_name' => 'required|unique:default_attributes|max:100|min:1',
        ]);
        $attribute->update($validate_data);
        return redirect()->back()->with('message', 'Attribute Updated Successfully');
    }

    public function delete($id){
        DefaultAttribute::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Attribute Deleted Successfully');
    }


}
