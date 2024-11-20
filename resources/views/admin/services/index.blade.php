@extends('dashboard')

@section('admin-content')
<head>
    
<style>
    /* Container Styling */
    .container {
        max-width: 100%;
        
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
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
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
        background-color: #1C3C3F; /* Alternate row color */
    }

    tr:hover {
        background-color: #174040; /* Row hover color */
    }
    td {
        font-size: 1em;
        color: #ffffff;
    }
</style>
</head>
<div class="container mt-4 p-4" style="background-color: #266867; border-radius: 8px;">
    <h1 class="mb-4 text-light" style="font-weight: bold; color: #F8F8F8;">Services</h1>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.services.create') }}" class="btn btn-create">Create New Service</a>
    </div>

    <table class="table table-striped table-bordered text-light">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }}</td>
                    <td>{{ Str::limit($service->description, 50) }}</td>
                    <td>
                        <!-- <img src="{{ $service->icon_url }}" alt="Icon" width="80"> -->
                    <img src="{{ asset('storage/' . $service->icon_url) }}" width="80" alt="Service Icon" class="service-icon">

                </td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;">
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

