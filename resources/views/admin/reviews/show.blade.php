<!-- resources/views/admin/reviews/show.blade.php -->

@extends('dashboard')

@section('admin-content')
    <h1 class="text-2xl font-semibold text-[#266867] mb-4">Review Details</h1>

    <div class="bg-white shadow-md rounded-lg p-6 border border-[#B3D4D4] mb-6">
        <h2 class="text-xl font-semibold text-[#051821] mb-2">{{ $review->client_name }}</h2>
        
        <!-- Display the client image -->
        <div class="mb-4">
            <strong class="text-[#266867]">Client Image:</strong>
            <img src="{{ asset('storage/' . $review->client_image) }}" alt="Client Image" class="w-32 h-32 rounded-full mt-2 border border-[#266867]">
        </div>

        <p class="text-[#266867] mb-2"><strong>Feedback:</strong> <span class="text-[#051821]">{{ $review->feedback }}</span></p>
        <p class="text-[#266867]"><strong>Rating:</strong> <span class="text-[#051821]">{{ $review->rating }} / 5</span></p>
    </div>

    <a href="{{ route('admin.reviews.index1') }}" class="inline-block px-4 py-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Back to Reviews</a>
@endsection
