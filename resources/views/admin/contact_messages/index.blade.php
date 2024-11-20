@extends('dashboard')

@section('admin-content')
<head>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 16px;
        text-align: left;
    }
    th {
        background-color: #051821;
        color: #ffffff;
    }
    .btn-action {
        color: #F58800;
        text-decoration: none;
        margin-right: 8px;
    }
    .btn-action:hover {
        color: #FFA500; /* Optional hover color */
    }
    .btn-action, .btn-back {
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-action {
        background-color: #F58800;
        color: #051821;
    }
    .btn-back {
        background-color: #266867;
        color: #F8F8F8;
    }

    .btn-action:hover, .btn-back:hover {
        background-color: #051821;
        color: #F8F8F8;
    }

    /* Card and Typography Styling */
    .card {
        padding: 20px;
        border-radius: 8px;
    }

    h1, h5, p {
        margin-bottom: 1em;
    }

    td {
        font-size: 1em;
        color: #ffffff;
    }
    @media (max-width: 700px) {
    .action a {
        display: block; /* or inline-block */
        margin: 10px 0; /* Applies 200px margin on the top and bottom */
    }
}

</style>

</head>
<div class="container mt-4 p-4" style="background-color: #266867; border-radius: 8px;">
    <h1 class="mb-4 text-light text-white">Contact Messages</h1>
<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #051821; color: #ffffff;">
            <th style="padding: 16px;">ID</th>
            <th style="padding: 16px;">Name</th>
            <th style="padding: 16px;">Email</th>
            <th style="padding: 16px;">Message</th>
            <th style="padding: 16px;" class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        <tr style="border-bottom: 1px solid #F58800;">
            <td style="padding: 16px; text-align: center;">{{ $message->id }}</td>
            <td style="padding: 16px;">{{ $message->name }}</td>
            <td style="padding: 16px;">
                <a href="mailto:{{ $message->email }}" class="text-decoration-none text-light">
                    {{ $message->email }}
                </a>
            </td>
            <td style="padding: 16px;">
                <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $message->message }}">
                    {{ Str::limit($message->message, 50) }}
                </span>
            </td>
            <td class="action" style="padding: 16px; text-align: center;">
                <a href="{{ route('admin.contact_messages.show', $message->id) }}" class="btn-action">View</a>
                <a href="mailto:{{ $message->email }}" class="btn-action">Reply</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    <div class="d-flex justify-content-center justify-between mt-3">
        @if($messages->previousPageUrl())
        <a href="{{ $messages->previousPageUrl() }}" class="btn-nav">Previous</a>
        @endif

        @if($messages->nextPageUrl())
        <a href="{{ $messages->nextPageUrl() }}" class="btn-nav ms-2">Next</a>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Button and Layout Styles */
    .btn-action, .btn-nav {
        display: inline-block;
        padding: 8px 16px;
        background-color: #F58800;
        color: #051821;
        border-radius: 4px;
        text-decoration: none;
        font-weight: bold;
        transition: background-color 0.3s, color 0.3s;
        margin-right: 10px;
    }

    .btn-action:hover, .btn-nav:hover {
        background-color: #051821;
        color: #F8F8F8;
    }

    table {
        width: 100%;
    }

    th, td {
        padding: 15px; /* Adds space between columns */
    }

    thead tr th {
        color: #F8F8F8;
        text-align: left;
    }

    tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.05);
    }

    /* Tooltip Style */
    [data-bs-toggle="tooltip"] {
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endpush
