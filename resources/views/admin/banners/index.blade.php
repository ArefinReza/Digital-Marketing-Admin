@extends('dashboard')

@section('admin-content')
<head>
<style>
    /* Container Styling */
    .container {
        max-width: 100%;
        padding: 20px;
    }

    /* Button Styling */
    .btn-create, .btn-edit, .btn-delete {
        padding: 10px 15px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-create {
        background-color: #F58800;
        color: #051821;
    }

    .btn-edit {
        background-color: #F58800;
        color: #051821;
    }

    .btn-delete {
        background-color: #C0392B;
        color: #F8F8F8;
    }

    .btn-create:hover, .btn-edit:hover {
        background-color: #051821;
        color: #F8F8F8;
    }

    .btn-delete:hover {
        background-color: #A93226;
        color: #F8F8F8;
    }

    /* Table Styling */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #1C3C3F;
        color: #ffffff;
    }

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #051821;
        color: #F8F8F8;
    }

    tr:nth-child(even) {
        background-color: #1C3C3F;
    }

    tr:hover {
        background-color: #174040;
    }

    /* Banner Image Styling */
    .banner-img {
        width: 80px;
        height: auto;
        border-radius: 4px;
    }
</style>
</head>
<div class="container mt-4 p-4" style="background-color: #266867; border-radius: 8px;">
    <h1 class="mb-4 text-white" style="font-weight: bold;">Banners</h1>

    @if(session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.banners.create') }}" class="btn btn-create mb-3">Create New Banner</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Banner Image</th>
                <th>Who We Are</th>
                <th>Intro Video</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td><img src="{{ asset('storage/' . $banner->banner_image) }}" alt="Banner Image"></td>
                    <td>{{ $banner->who_we_are }}</td>
                    <td><video src="{{ asset('storage/' . $banner->intro_video) }}" controls></video></td>
                    <td>
                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('styles')

@endpush
