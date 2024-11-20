@extends('dashboard')

@section('admin-content')
<head>
    <style>
        /* Button Styling */
        .btn-create, .btn-secondary {
            padding: 10px 15px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
            display: inline-block;
            margin-right: 10px;
        }

        .btn-create {
            background-color: #F58800;
            color: #051821;
        }

        .btn-secondary {
            background-color: #C0392B;
            color: #F8F8F8;
        }

        .btn-create:hover, .btn-secondary:hover {
            background-color: #051821;
            color: #F8F8F8;
        }
    </style>
</head>

<div class="container mt-4 p-4" style="background-color: #266867; border-radius: 8px; max-width: 100%;">
    <h1 class="text-light mb-4" style="font-weight: bold;">Edit Banner</h1>

    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label class="text-light" for="banner_image" style="font-weight: bold;">Banner Image:</label>
            <input type="file" name="banner_image" class="form-control" style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px;">
            @if ($banner->banner_image)
                <img src="{{ asset('storage/' . $banner->banner_image) }}" alt="Current Banner Image" style="max-width: 100px; margin-top: 10px;">
            @endif
        </div>

        <div class="form-group mb-3">
            <label class="text-light" for="who_we_are" style="font-weight: bold;">Who We Are:</label>
            <textarea name="who_we_are" class="form-control" required style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px; height: 100px; width:100%;">{{ $banner->who_we_are }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label class="text-light" for="intro_video" style="font-weight: bold;">Intro Video:</label>
            <input type="file" name="intro_video" class="form-control" style="background-color: #1C3C3F; color: #F8F8F8; border: none; padding: 10px;">
            @if ($banner->intro_video)
                <video src="{{ asset('storage/' . $banner->intro_video) }}" controls style="max-width: 200px; margin-top: 10px;"></video>
            @endif
        </div>

        <button type="submit" class="btn btn-create">Update</button>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">Back to Banners</a>
    </form>
</div>

@endsection
