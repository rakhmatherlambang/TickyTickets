<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryModel extends Component
{
    public $categories = [];
    public $selectedCategory;
    public $subcategories = [];
    public function mount(){
        $this->categories = Category::all(); 
    }
    public function render()
    {
        return view('livewire.category-model');
    }
    public function updatedSelectedCategory($categoryId){
        $this->subcategories = Subcategory::where('category_id', $categoryId)->get();
    }
}
