@extends('dashboard')

@section('admin-content')

<style>
  
    .btn-edit:hover, .btn-edit:hover {
        background-color: #051821;
        color: #F8F8F8;
    }
    .btn-edit {
        background-color: #F58800;
        color: #051821;
        padding: 10px 15px;
        border-radius: 4px;
    }

</style>
</head>
<div class="container mt-4 p-4" style="background-color: #266867; border-radius: 8px; max-width: 100%;">
    <h1 class="text-3xl font-bold text-center text-gray-50 mb-6">Create New Banner</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div class="form-group">
            <label for="banner_image" class="block font-semibold text-gray-50">Banner Image:</label>
            <input type="file" name="banner_image" id="banner_image" required style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px; width:100%;">
        </div>

        <div class="form-group">
            <label for="who_we_are" class="block font-semibold text-gray-50">Who We Are:</label>
            <textarea name="who_we_are" id="who_we_are" required style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px; width:100%;">{{ old('who_we_are') }}</textarea>
        </div>

        <div class="form-group">
            <label for="intro_video" class="block font-semibold text-gray-50">Intro Video:</label>
            <input type="file" name="intro_video" id="intro_video" required style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px; width:100%;">
        </div>

        <button type="submit" class="w-full py-2 mt-4 text-white font-semibold btn btn-edit rounded-lg hover:bg-primary-dark">Create Banner</button>
    </form>

    <a href="{{ route('admin.banners.index') }}" class="inline-block mt-6 text-secondary btn btn-edit hover:text-secondary-dark">Back to Banners</a>
</div>

@endsection
