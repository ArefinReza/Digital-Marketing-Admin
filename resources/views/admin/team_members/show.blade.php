<!-- resources/views/admin/team_members/show.blade.php -->

@extends('dashboard')

@section('admin-content')
    <div class="max-w-2xl mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center text-[#266867] mb-6">Team Member Details</h1>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="flex flex-col items-center p-6">
                <img src="{{ asset('storage/' . $teamMember->photo_url) }}" alt="{{ $teamMember->name }}" class="w-32 h-32 object-cover rounded-full border-4 border-[#266867] mb-4">
                <h2 class="text-2xl font-bold text-[#266867]">{{ $teamMember->name }}</h2>
                <p class="text-lg text-gray-700"><strong>Role:</strong> {{ $teamMember->role }}</p>
                <div class="w-full border-b border-gray-300 my-4"></div>

                <h3 class="text-lg font-semibold text-[#266867]">Contact Information</h3>
                <p class="text-gray-700"><strong>Email:</strong> {{ $teamMember->email }}</p>
                <p class="text-gray-700"><strong>Phone Number:</strong> {{ $teamMember->phonenumber }}</p>
                <p class="text-gray-700"><strong>WhatsApp:</strong> {{ $teamMember->whatsapp }}</p>

                <div class="w-full border-b border-gray-300 my-4"></div>

                <h3 class="text-lg font-semibold text-[#266867]">Professional Details</h3>
                <p class="text-gray-700"><strong>Portfolio:</strong> {{ $teamMember->portfolio }}</p>
                <p class="text-gray-700"><strong>Education:</strong> {{ $teamMember->education }}</p>
                <p class="text-gray-700"><strong>Skills:</strong> {{ $teamMember->skills }}</p>
                <p class="text-gray-700"><strong>Experience:</strong> {{ $teamMember->experience }}</p>
            </div>
        </div>

        <div class="flex justify-center mt-6">
            <a href="{{ route('admin.team_members.index1') }}" class="px-6 py-2 bg-[#F58800] text-white font-bold rounded hover:bg-[#051821]">Back to Team Members</a>
        </div>
    </div>
@endsection
