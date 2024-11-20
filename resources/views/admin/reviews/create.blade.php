<!-- resources/views/admin/reviews/create.blade.php -->

@extends('dashboard')

@section('admin-content')

    <h1 class="text-2xl font-semibold text-[#266867] mb-6">Add New Review</h1>

    <form action="{{ route('admin.reviews.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded-lg border border-[#B3D4D4] space-y-4">
    @csrf
    <div class="mb-4">
        <label for="client_name" class="block font-medium text-[#266867] mb-2">Client Name:</label>
        <input type="text" name="client_name" class="w-full p-2 border border-gray-300 rounded" required>
    </div>

    <div class="mb-4">
        <label for="client_image" class="block font-medium text-[#266867] mb-2">Client Image:</label>
        <input type="file" name="client_image" class="w-full p-2 border border-gray-300 rounded" required>
    </div>

    <div class="mb-4">
        <label for="feedback" class="block font-medium text-[#266867] mb-2">Feedback:</label>
        <textarea name="feedback" class="w-full p-2 border border-gray-300 rounded" required></textarea>
    </div>

    <div class="mb-4">
        <label for="rating" class="block font-medium text-[#266867] mb-2">Rating (1-5):</label>
        <input type="number" name="rating" class="w-full p-2 border border-gray-300 rounded" min="1" max="5" required>
    </div>

    <button type="submit" class="px-4 py-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Submit</button>
</form>

    <a href="{{ route('admin.reviews.index1') }}" class="inline-block px-4 py-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Back to Reviews</a>

@endsection
