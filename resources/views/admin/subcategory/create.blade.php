@extends('admin.layouts.layout')

@section('admin_page_title')
Create Sub Category
@endsection

@section('admin_layout')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Sub Category</h5>
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
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('store.subcat') }}" method="POST">
                        @csrf
                        <label for="subcategory_name" class="form-label fw-bold mb-2">Sub Category Name</label>
                        <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                            placeholder="Enter Sub Category Name">

                        <label for="category_id" class="form-label fw-bold my-2">Select Category</label>
                        <select class="form-select" id="category_id" name="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-primary mt-3">Create Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
