<!-- resources/views/admin/team_members/edit.blade.php -->

@extends('dashboard')

@section('admin-content')
<div class="max-w-2xl mt-8">
    <h1 class="text-3xl font-bold text-center text-[#266867] mb-6">Edit Team Member</h1>

    <form action="{{ route('admin.team_members.update', $teamMember->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-lg" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-4">
            <label for="name" class="font-semibold text-[#266867]">Name:</label>
            <input type="text" name="name" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" value="{{ $teamMember->name }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="role" class="font-semibold text-[#266867]">Role:</label>
            <input type="text" name="role" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" value="{{ $teamMember->role }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="portfolio" class="font-semibold text-[#266867]">Portfolio:</label>
            <textarea name="portfolio" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" required>{{ $teamMember->portfolio }}</textarea>
        </div>

        <div class="form-group mb-4">
        <label for="photo_url" class="font-semibold text-[#266867]">Photo:</label>
        <input type="file" name="photo_url" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full">
        <!-- Display existing image if available -->
        @if($teamMember->photo_url)
            <img src="{{ asset('storage/' . $teamMember->photo_url) }}" alt="Current Photo" class="mt-2" style="width: 100px; height: auto;">
        @endif
    </div>

        <div class="form-group mb-4">
            <label for="email" class="font-semibold text-[#266867]">Email:</label>
            <input type="email" name="email" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" value="{{ $teamMember->email }}">
        </div>

        <div class="form-group mb-4">
            <label for="facebookLink" class="font-semibold text-[#266867]">Facebook Link:</label>
            <input type="text" name="facebookLink" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" value="{{ $teamMember->facebookLink }}">
        </div>

        <div class="form-group mb-4">
            <label for="linkedinLink" class="font-semibold text-[#266867]">LinkedIn Link:</label>
            <input type="text" name="linkedinLink" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" value="{{ $teamMember->linkedinLink }}">
        </div>

        <div class="form-group mb-4">
            <label for="phonenumber" class="font-semibold text-[#266867]">Phone Number:</label>
            <input type="text" name="phonenumber" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" value="{{ $teamMember->phonenumber }}">
        </div>

        <div class="form-group mb-4">
            <label for="whatsapp" class="font-semibold text-[#266867]">WhatsApp Number:</label>
            <input type="text" name="whatsapp" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" value="{{ $teamMember->whatsapp }}">
        </div>

        <div class="form-group mb-4">
            <label for="education" class="font-semibold text-[#266867]">Education:</label>
            <input type="text" name="education" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" value="{{ $teamMember->education }}">
        </div>

        <div class="form-group mb-4">
            <label for="skills" class="font-semibold text-[#266867]">Skills:</label>
            <input type="text" name="skills" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" value="{{ $teamMember->skills }}">
        </div>

        <div class="form-group mb-4">
            <label for="experience" class="font-semibold text-[#266867]">Experience:</label>
            <input type="text" name="experience" class="form-control mt-1 border border-gray-300 rounded-md p-2 w-full" value="{{ $teamMember->experience }}">
        </div>

        <button type="submit" class="btn btn-primary bg-[#F58800] text-white font-bold rounded hover:bg-[#051821] w-full py-2">Update</button>
    </form>
</div>
@endsection
