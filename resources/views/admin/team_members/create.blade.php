<!-- resources/views/admin/team_members/create.blade.php -->

@extends('dashboard')

@section('admin-content')
    <div class="max-w-3xl mt-8 bg-white shadow-lg rounded-lg overflow-hidden">
        <h1 class="text-3xl font-bold text-center text-[#266867] py-6 border-b border-gray-200">Add New Team Member</h1>

        <form action="{{ route('admin.team_members.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">

            @csrf

            <!-- Personal Info Section -->
            <div class="space-y-2">
                <h2 class="text-xl font-semibold text-[#266867] border-b border-gray-300 pb-2">Personal Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="name" class="block text-gray-700 font-medium mb-1">Name:</label>
                        <input type="text" name="name" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]" required>
                    </div>
                    <div class="form-group">
                        <label for="role" class="block text-gray-700 font-medium mb-1">Role:</label>
                        <input type="text" name="role" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]" required>
                    </div>
                    <div class="form-group col-span-full">
                        <label for="photo_url" class="block text-gray-700 font-medium mb-1">Photo URL:</label>
                        <input type="file" name="photo_url" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]" required>
                    </div>
                    <div class="form-group col-span-full">
                        <label for="portfolio" class="block text-gray-700 font-medium mb-1">Portfolio:</label>
                        <textarea name="portfolio" rows="3" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]" required></textarea>
                    </div>
                </div>
            </div>

            <!-- Contact Info Section -->
            <div class="space-y-2">
                <h2 class="text-xl font-semibold text-[#266867] border-b border-gray-300 pb-2">Contact Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="email" class="block text-gray-700 font-medium mb-1">Email:</label>
                        <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]">
                    </div>
                    <div class="form-group">
                        <label for="phonenumber" class="block text-gray-700 font-medium mb-1">Phone Number:</label>
                        <input type="text" name="phonenumber" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]">
                    </div>
                    <div class="form-group">
                        <label for="whatsapp" class="block text-gray-700 font-medium mb-1">WhatsApp Number:</label>
                        <input type="text" name="whatsapp" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]">
                    </div>
                </div>
            </div>

            <!-- Links Section -->
            <div class="space-y-2">
                <h2 class="text-xl font-semibold text-[#266867] border-b border-gray-300 pb-2">Social Media Links</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="facebookLink" class="block text-gray-700 font-medium mb-1">Facebook Link:</label>
                        <input type="text" name="facebookLink" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]">
                    </div>
                    <div class="form-group">
                        <label for="linkedinLink" class="block text-gray-700 font-medium mb-1">LinkedIn Link:</label>
                        <input type="text" name="linkedinLink" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]">
                    </div>
                </div>
            </div>

            <!-- Professional Details Section -->
            <div class="space-y-2">
                <h2 class="text-xl font-semibold text-[#266867] border-b border-gray-300 pb-2">Professional Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="education" class="block text-gray-700 font-medium mb-1">Education:</label>
                        <input type="text" name="education" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]">
                    </div>
                    <div class="form-group">
                        <label for="skills" class="block text-gray-700 font-medium mb-1">Skills:</label>
                        <input type="text" name="skills" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]">
                    </div>
                    <div class="form-group col-span-full">
                        <label for="experience" class="block text-gray-700 font-medium mb-1">Experience:</label>
                        <input type="text" name="experience" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-[#266867]">
                    </div>
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="mt-4 px-8 py-2 bg-[#F58800] text-white font-bold rounded hover:bg-[#051821]">Submit</button>
            </div>
        </form>
    </div>
@endsection
