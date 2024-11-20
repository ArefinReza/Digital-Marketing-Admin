@extends('dashboard')

@section('admin-content')
<head>
    <style>
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

    h1 {
        font-size: 1.6em;
    }
    </style>
</head>
<div class="container mt-4 p-4" style="max-width: 600px; background-color: #266867; border-radius: 8px;">
    <h1 class="mb-4 text-light" style="font-weight: bold; color: #F8F8F8;">Message Details</h1>

    <div class="card shadow-lg" style="background-color: #051821; border: none; border-radius: 8px;">
        <div class="card-body" style="padding: 20px; color: #F8F8F8;">
            <h5 class="card-title mb-3" style="font-size: 1.2em; font-weight: bold; color: #F58800;">
                From: {{ $message->name }}
            </h5>
            <p class="card-subtitle mb-2 text-muted" style="font-size: 0.9em;">
                <strong>Email:</strong> <a href="mailto:{{ $message->email }}" style="color: #F8F8F8;">{{ $message->email }}</a>
            </p>
            <hr style="border: 1px solid #F58800;">

            <div class="mb-3">
                <h6 class="fw-bold" style="font-size: 1em; color: #F8F8F8;">Message:</h6>
                <p class="card-text" style="white-space: pre-wrap; font-size: 1em; line-height: 1.5;">{{ $message->message }}</p>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="mailto:{{ $message->email }}" ><Button class="btn-action">Reply</Button></a>
                <a href="{{ route('admin.contact_messages.index') }}" class="btn-back">Back to Messages</a>
            </div>
        </div>
    </div>
</div>
@endsection
