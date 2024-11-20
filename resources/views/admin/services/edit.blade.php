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
    .btn-create {
        padding: 10px 15px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        background-color: #F58800;
        color: #051821;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-create:hover {
        background-color: #051821;
        color: #F8F8F8;
    }

    .btn-secondary {
        padding: 10px 15px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        background-color: #C0392B;
        color: #F8F8F8;
        transition: background-color 0.3s, color 0.3s;
        margin-left: 10px;
    }

    .btn-secondary:hover {
        background-color: #A93226;
        color: #F8F8F8;
    }

    /* Form Styling */
    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        color: #F8F8F8;
    }

    input[type="text"], textarea, input[type="file"] {
        width: 100%;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid #F58800;
        background-color: #1C3C3F;
        color: #ffffff;
        font-size: 1em;
    }

    input[type="text"]:focus, textarea:focus, input[type="file"]:focus {
        border-color: #F58800;
        outline: none;
        box-shadow: 0 0 5px rgba(245, 136, 0, 0.5);
    }

    textarea {
        height: 100px; /* Adjust height for better appearance */
        resize: vertical; /* Allow vertical resize */
    }
</style>
</head>
<div class="container mt-4 p-4" style="background-color: #266867; border-radius: 8px;">
    <h1 class="mb-4 text-light" style="font-weight: bold;">Edit Service</h1>

    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title" class="text-light">Title:</label>
            <input type="text" name="title" id="title" value="{{ $service->title }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="text-light">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $service->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="icon" class="text-light">Icon:</label>
            <input type="file" name="icon" id="icon" class="form-control">
            <!-- Display the current icon -->
            @if($service->icon_url)
                <p>Current Icon: <img src="{{ asset('storage/' . $service->icon_url) }}" alt="Icon" style="width: 50px; height: auto;"></p>
            @endif
        </div>

        <button type="submit" class="btn btn-create">Update</button>
        <a href="{{ route('admin.services.index1') }}" class="btn btn-secondary">Back to Services</a>
    </form>
</div>
@endsection
