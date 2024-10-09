@extends('admin.layouts.layout')
@section('admin_page_title')
    Edit Attribute
@endsection
@section('admin_layout')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Attribute</h5>
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
                    <form action="{{route('update.attribute',$attribute_info->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="attribute_name" class="form-label fw-bold mb-2">Attribute Name</label>
                        <input type="text" class="form-control" name="attribute_name" value="{{$attribute_info->attribute_name}}">
                        <button type="submit" class="btn btn-primary w-100 my-4">Update Attribute</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
