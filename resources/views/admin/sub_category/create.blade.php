@extends('admin.layouts.layout')
@section('admin_page_title')
Create SubCategory | Admin
@endsection
@section('admin_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Create SubCategory</h5>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('store.subcat') }}" method="POST">
                @csrf
                <label for="subcategory_name" class="fw-bold mb-2">Give New SubCategory Name</label>
                <input type="text" class="form-control" name="subcategory_name" placeholder="Concert Ticket">

                <label for="category_id" class="fw-bold mb-2">Select Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary w-100 mt-2">Add New SubCategory</button>
            </form>
        </div>
    </div>
@endsection