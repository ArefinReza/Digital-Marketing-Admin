<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>Here you can manage all your website items like projects, services, team members, and reviews.</p>

        <!-- Add quick links to manage sections -->
        <div class="mt-4">
            <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Manage Services</a>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Manage Projects</a>
            <a href="{{ route('admin.team-members.index') }}" class="btn btn-primary">Manage Team Members</a>
            <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary">Manage Reviews</a>
        </div>
    </div>
@endsection
