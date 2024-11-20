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
    .table {
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

    /* Project Images */
    .project-image {
        margin: 5px;
        border-radius: 4px;
    }
    .description{
        max-width: 30px;
    }


    /* Pagination Styling */
    .pagination {
        /* display: flex;
        justify-content: center; */
        margin-top: 20px;
        
    }

    .pagination .page-item .page-link {
        padding: 8px 12px;
        margin: 0 4px;
        background-color: #051821;
        color: #F8F8F8;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .pagination .page-item .page-link:hover {
        background-color: #F58800;
    }

    .pagination .page-item.active .page-link {
        background-color: #F58800;
        color: #051821;
        pointer-events: none;
    }
    .pagination p{
        color: #F58800;
    }
</style>
</head>
<div class="container mt-4 p-4" style="background-color: #266867; border-radius: 8px;">
    <h1 class="text-light mb-4" style="font-weight: bold;">Projects</h1>

    @if(session('success'))
        <p class="text-success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('admin.projects.create') }}" class="btn btn-create mb-3">Create New Project</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->description }}</td>
            <td>
                @php
                    // Decode the JSON string to get an array of image paths
                    $imageUrls = is_string($project->images) ? json_decode($project->images, true) : $project->images;
                @endphp

                @if(is_array($imageUrls))
                    @foreach($imageUrls as $imageUrl)
                        @if(is_string($imageUrl))
                            <img src="{{ asset('storage/' . $imageUrl) }}" width="80" alt="Project Image" class="project-image" style="margin-right: 5px;">
                        @endif
                    @endforeach
                @endif
            </td>
            <td>
                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

    </table>

    <!-- Pagination Links -->
    <div class="pagination">
        {{ $projects->links() }}
    </div>
</div>


@endsection
