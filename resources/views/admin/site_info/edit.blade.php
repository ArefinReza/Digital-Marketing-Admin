@extends('dashboard')

@section('admin-content')
<div class="max-w-3xl mx-auto mt-8 bg-white p-8 shadow-md rounded-lg">
    <h1 class="text-3xl font-bold text-center text-primary mb-6">Edit Site Information</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.site_info.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="sitename" class="block font-semibold text-gray-700">Site Name:</label>
            <input type="text" name="sitename" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" value="{{ $siteInfo->sitename }}" required>
        </div>

        <div class="form-group">
            <label for="email" class="block font-semibold text-gray-700">Email:</label>
            <input type="email" name="email" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" value="{{ $siteInfo->email }}" required>
        </div>

        <div class="form-group">
            <label for="phone_number" class="block font-semibold text-gray-700">Phone Number:</label>
            <input type="text" name="phone_number" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" value="{{ $siteInfo->phone_number }}" required>
        </div>

        <div class="form-group">
            <label for="about" class="block font-semibold text-gray-700">About:</label>
            <textarea name="about" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" required>{{ $siteInfo->about }}</textarea>
        </div>

        <div class="form-group">
            <label for="refund" class="block font-semibold text-gray-700">Refund Policy:</label>
            <textarea name="refund" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" required>{{ $siteInfo->refund }}</textarea>
        </div>

        <div class="form-group">
            <label for="parchase_guide" class="block font-semibold text-gray-700">Purchase Guide:</label>
            <textarea name="parchase_guide" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" required>{{ $siteInfo->parchase_guide }}</textarea>
        </div>

        <div class="form-group">
            <label for="privacy" class="block font-semibold text-gray-700">Privacy Policy:</label>
            <textarea name="privacy" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" required>{{ $siteInfo->privacy }}</textarea>
        </div>

        <div class="form-group">
            <label for="address" class="block font-semibold text-gray-700">Address:</label>
            <textarea name="address" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" required>{{ $siteInfo->address }}</textarea>
        </div>

        <div class="form-group">
            <label for="facebook_link" class="block font-semibold text-gray-700">Facebook Link:</label>
            <input type="text" name="facebook_link" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" value="{{ $siteInfo->facebook_link }}" required>
        </div>

        <div class="form-group">
            <label for="twitter_link" class="block font-semibold text-gray-700">Twitter Link:</label>
            <input type="text" name="twitter_link" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" value="{{ $siteInfo->twitter_link }}" required>
        </div>

        <div class="form-group">
            <label for="instagram_link" class="block font-semibold text-gray-700">Instagram Link:</label>
            <input type="text" name="instagram_link" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" value="{{ $siteInfo->instagram_link }}" required>
        </div>

        <div class="form-group">
            <label for="copyright_text" class="block font-semibold text-gray-700">Copyright Text:</label>
            <input type="text" name="copyright_text" class="form-control bg-gray-100 border border-gray-300 rounded w-full py-2 px-4" value="{{ $siteInfo->copyright_text }}" required>
        </div>

        <button type="submit" class="w-full mt-4 p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Update Site Information</button>
    </form>
    <br>

    <a href="{{ route('admin.site_info.index1') }}" class="mt-8 p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Back to Site Info</a>
</div>
@endsection
