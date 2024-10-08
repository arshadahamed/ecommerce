@extends('admin.layouts.layout')

@section('admin_page_title')
    Manage Sub Category
@endsection

@section('admin_layout')
    <div class="row justify-content-center">
        <div class="col-12 col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Sub Categories</h5>
                </div>
                <div class="card-body">
                    @if ($subcategories->isEmpty())
                        <div class="alert alert-warning">No data available</div>
                    @else
                        <div class="my-2">
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <div class="relative overflow-auto max-w-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-lg text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">#</th>
                                            <th scope="col" class="px-6 py-3">SubCategory</th>
                                            <th scope="col" class="px-6 py-3">Category</th>
                                            <th scope="col" class="px-6 py-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategories as $subcategory)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $subcategory->id }}
                                                </th>
                                                <td class="px-6 py-4">{{ $subcategory->subcategory_name }}</td>
                                                <td class="px-6 py-4">{{ $subcategory->category->category_name }}</td>
                                                <td class="px-6 py-4">
                                                    <!-- Edit Button -->
                                                    <a href="{{ route('show.subcat', $subcategory->id) }}" class="btn btn-sm btn-success rounded">Edit</a>

                                                    <!-- Delete Button -->
                                                    <form action="{{ route('delete.subcat', $subcategory->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger rounded" onclick="return confirm('Are you sure you want to delete this sub category?');">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
