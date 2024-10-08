@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Category
@endsection
@section('admin_layout')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Category</h5>
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
                    <form action="{{ route('store.cat') }}" method="POST">
                        @csrf
                        <label for="category_name" class="form-label fw-bold mb-2">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name"
                            placeholder="Enter Category Name">
                        <button type="submit" class="btn btn-primary w-100 my-4">Add Category</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
