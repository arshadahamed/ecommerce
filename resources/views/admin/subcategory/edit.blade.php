@extends('admin.layouts.layout')

@section('admin_page_title')
    Edit Sub Category
@endsection

@section('admin_layout')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Sub Category</h5>
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

                    <form action="{{ route('update.subcat', $subcategory_info->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="subcategory_name" class="form-label fw-bold mb-2">Sub Category Name</label>
                        <input type="text" class="form-control" name="subcategory_name"
                            value="{{ old('subcategory_name', $subcategory_info->subcategory_name) }}" required>

                        <label for="category_id" class="form-label fw-bold mb-2">Category Name</label>
                        <select class="form-control" name="category_id" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $subcategory_info->category_id) selected @endif>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary w-100 my-4">Update Sub Category</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
