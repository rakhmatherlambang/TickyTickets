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
}
