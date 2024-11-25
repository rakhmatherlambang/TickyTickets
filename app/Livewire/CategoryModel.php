<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryModel extends Component
{
    public $categories = [];
    public $selectedCategory;
    public function mount(){
        $this->categories = Category::all(); 
    }
    public function render()
    {
        return view('livewire.category-model');
    }
}
