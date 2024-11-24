<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class SellerStoreController extends Controller
{
    public function index(){
        return view('seller.store.create');
    }
    public function manage(){
        $userid = Auth::user()->id;
        $stores = Store::where('user_id', $userid)->get();
        return view('seller.store.manage', compact('stores'));
    }
    public function store(Request $request){
        $validate_data = $request->validate([
            'slug' => 'required|unique:stores',
            'store_name' => 'unique:stores|max:100|min:3',
            'details' => 'required',
        ]);

        Store::create([
            'user_id'=>Auth::user()->id,
            'slug' => $request->slug,
            'store_name' => $request->store_name,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'Store Succcesfully Added');
    }
}
