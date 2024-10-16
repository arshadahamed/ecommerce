@extends('admin.layouts.layout')
@section('admin_page_title')
Create Product Attribute
@endsection
@section('admin_layout')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Product Attribute</h5>
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
                    <form action="{{ route('attribute.create') }}" method="POST">
                        @csrf
                        <label for="attribute_name" class="form-label fw-bold mb-2">Attribute Name</label>
                        <input type="text" class="form-control" id="attribute_name" name="attribute_name"
                            placeholder="Enter Attribute Name">
                        <button type="submit" class="btn btn-primary w-100 my-4">Add Attribute</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
