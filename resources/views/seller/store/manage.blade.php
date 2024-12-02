@extends('seller.layouts.layout')
@section('seller_page_title')
Manage Store
@endsection
@section('seller_layout')
    <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Your Store</h5>
        </div>

        @if(session('success')) 
            <div class="alert alert-success my-2">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Store Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($stores as $store)
                        <tr>
                            <td>{{ $store->id }}</td>
                            <td>{{ $store->store_name }}</td>
                            <td>{{ $store->slug }}</td>
                            <td>{{ $store->details }}</td>
                            <td>
                                <a href="{{ route('show.store', $store->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('delete.store', $store->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection