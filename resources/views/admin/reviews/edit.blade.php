<!-- resources/views/admin/reviews/edit.blade.php -->
@extends('dashboard')

@section('admin-content')
    <h1 class="text-2xl font-semibold text-[#266867] mb-4">Edit Review</h1>

    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="client_name" class="block font-medium text-[#266867] mb-1">Client Name:</label>
        <input type="text" name="client_name" class="w-full p-2 border border-[#B3D4D4] rounded text-[#051821]" value="{{ $review->client_name }}" required>
    </div>

    <div class="mb-4">
        <label for="client_image" class="block font-medium text-[#266867] mb-1">Client Image:</label>
        <input type="file" name="client_image" class="w-full p-2 border border-[#B3D4D4] rounded text-[#051821]">
        @if($review->client_image)
            <p class="text-sm text-gray-600 mt-2">Current Image:</p>
            <img src="{{ asset('storage/' . $review->client_image) }}" alt="Client Image" class="h-20 w-20 object-cover rounded mt-2">
        @endif
    </div>

    <div class="mb-4">
        <label for="feedback" class="block font-medium text-[#266867] mb-1">Feedback:</label>
        <textarea name="feedback" class="w-full p-2 border border-[#B3D4D4] rounded text-[#051821]" required>{{ $review->feedback }}</textarea>
    </div>

    <div class="mb-4">
        <label for="rating" class="block font-medium text-[#266867] mb-1">Rating (1-5):</label>
        <input type="number" name="rating" class="w-full p-2 border border-[#B3D4D4] rounded text-[#051821]" min="1" max="5" value="{{ $review->rating }}" required>
    </div>

    <button type="submit" class="px-4 py-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Update</button>
</form>

@endsection
