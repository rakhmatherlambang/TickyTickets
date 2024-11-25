<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class MasterSubcategoryController extends Controller
{
    public function storesubcat(Request $request){
        $validate_data = $request->validate([
            'subcategory_name' => 'unique:subcategories|max:100|min:1',
            'category_id' => 'required|exists:categories,id'
        ]);


        SubCategory::create($validate_data);

        return redirect()->back()->with('success', 'Subcategory Succcesfully Added');
    }

    public function showsubcat($id){
        $subcategory_info = Subcategory::find($id);
        return view('admin.sub_category.edit', compact('subcategory_info'));
    }

    public function updatesubcat(Request $request, $id){
        $subcategory = Subcategory::findOrFail($id);
        $validate_data = $request->validate([
            'subcategory_name' => 'unique:subcategories|max:100|min:1',
        ]);

        $subcategory->update($validate_data);

        return redirect()->back()->with('success', 'Subcategory Updated successfully'); 
    }
    public function deletesubcat($id){
        Subcategory::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Subcategory Delete successfully'); 
    }
}
