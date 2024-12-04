<div>
    <label for="category_id" class="fw-bold mb-2">Select Category</label>
    <select class="form-control" name="category_id" wire:model.live="selectedCategory">
        <option value="">Select a Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>

    <label for="subcategory_id" class="fw-bold mb-2">Select Subcategory</label>
    <select class="form-control" name="subcategory_id">
        <option value="">Select a Subcategory</option>
        @foreach ($subcategories as $subcategory)
            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
        @endforeach
    </select>
</div>
