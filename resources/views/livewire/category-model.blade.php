<div>
    <select class="form-control" wire:model.live="selectedCategory">
        <option value="">Select a Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>

    {{ $selectedCategory }}
</div>
