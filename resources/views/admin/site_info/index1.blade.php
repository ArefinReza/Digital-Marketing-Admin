@extends('dashboard')

@section('admin-content')
<div class="max-w-3xl mx-auto mt-8 bg-white p-8 shadow-md rounded-lg">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Site Information</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-gray-50 p-6 rounded-lg shadow-lg">
        <h5 class="text-xl font-semibold text-gray-700 mb-4">Site Name: {{ $siteInfo->sitename }}</h5>
        
        <div class="grid gap-3 text-gray-600">
            <p><strong>Email:</strong> {{ $siteInfo->email }}</p>
            <p><strong>Phone Number:</strong> {{ $siteInfo->phone_number }}</p>
            <p><strong>About:</strong> {{ $siteInfo->about }}</p>
            <p><strong>Refund Policy:</strong> {{ $siteInfo->refund }}</p>
            <p><strong>Purchase Guide:</strong> {{ $siteInfo->parchase_guide }}</p>
            <p><strong>Privacy Policy:</strong> {{ $siteInfo->privacy }}</p>
            <p><strong>Address:</strong> {{ $siteInfo->address }}</p>
            <p><strong>Facebook:</strong> <a href="{{ $siteInfo->facebook_link }}" class="text-blue-600 hover:underline">{{ $siteInfo->facebook_link }}</a></p>
            <p><strong>Twitter:</strong> <a href="{{ $siteInfo->twitter_link }}" class="text-blue-600 hover:underline">{{ $siteInfo->twitter_link }}</a></p>
            <p><strong>Instagram:</strong> <a href="{{ $siteInfo->instagram_link }}" class="text-blue-600 hover:underline">{{ $siteInfo->instagram_link }}</a></p>
            <p><strong>Copyright:</strong> {{ $siteInfo->copyright_text }}</p>
        </div>
        
        <div class="mt-6 text-center">
            <a href="{{ route('admin.site_info.edit', $siteInfo->id) }}" class="mt-4 p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Edit Site Info</a>
        </div>
    </div>
</div>
@endsection
