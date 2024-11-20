<!-- resources/views/admin/reviews/index.blade.php -->

@extends('dashboard')

@section('admin-content')
    <h1 class="text-2xl font-semibold text-[#266867] mb-4">All Reviews</h1>

    <a href="{{ route('admin.reviews.create') }}" class="mb-4 inline-block p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Add New Review</a>

    @if(session('success'))
        <div class="alert alert-success p-2 mb-4 bg-[#B3D4D4] text-[#266867] rounded">{{ session('success') }}</div>
    @endif

    <table class="w-full border border-[#B3D4D4] rounded text-[#051821]">
        <thead>
            <tr class="bg-[#266867] text-white">
                <th class="p-2 border border-[#B3D4D4]">ID</th>
                <th class="p-2 border border-[#B3D4D4]">Client Name</th>
                <th class="p-2 border border-[#B3D4D4]">Rating</th>
                <th class="p-2 border border-[#B3D4D4]">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr class="hover:bg-[#E6F2F2]">
                    <td class="p-2 border border-[#B3D4D4] text-center">{{ $review->id }}</td>
                    <td class="p-2 border border-[#B3D4D4] text-center">{{ $review->client_name }}</td>
                    <td class="p-2 border border-[#B3D4D4] text-center">{{ $review->rating }}</td>
                    <td class="p-2 border border-[#B3D4D4] text-center">
                        <a href="{{ route('admin.reviews.show', $review->id) }}" class="px-2 py-1 bg-[#266867] text-white rounded hover:bg-[#F58800]">View</a>
                        <a href="{{ route('admin.reviews.edit', $review->id) }}" class="px-2 py-1 bg-[#F58800] text-white rounded hover:bg-[#051821]">Edit</a>
                        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4 flex justify-center space-x-2">
        @if($reviews->onFirstPage())
            <span class="px-4 py-2 bg-gray-300 rounded text-gray-500">Previous</span>
        @else
            <a href="{{ $reviews->previousPageUrl() }}" class="px-4 py-2 bg-[#266867] text-white rounded hover:bg-[#051821]">Previous</a>
        @endif

        @if($reviews->hasMorePages())
            <a href="{{ $reviews->nextPageUrl() }}" class="px-4 py-2 bg-[#266867] text-white rounded hover:bg-[#051821]">Next</a>
        @else
            <span class="px-4 py-2 bg-gray-300 rounded text-gray-500">Next</span>
        @endif
    </div>
@endsection
