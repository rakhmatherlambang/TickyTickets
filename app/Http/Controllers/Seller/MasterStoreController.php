<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class MasterStoreController extends Controller
{
    public function show_store($id)
    {
        $store = Store::findOrFail($id);
        return view('seller.store.edit', compact('store'));
    }
    public function update_store(Request $request, $id)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'slug' => 'required|string|max:255|unique:stores,slug,' . $id,
        ]);

        $store = Store::findOrFail($id);
        $store->update([
            'store_name' => $request->store_name,
            'details' => $request->details,
            'slug' => $request->slug,
        ]);

        return redirect()->back()->with('success', 'Store updated successfully.');
    }
    public function delete_store($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->back()->with('success', 'Store deleted successfully.');
    }

}
