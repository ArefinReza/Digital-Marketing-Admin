@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Include precompiled Tailwind CSS -->
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <style>
        @media (min-width: 768px) {
            #sidebarToggle {
                display: none;
            }
        }
        @media (max-width: 700px) {
            #sidebar {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">
    <!-- Toggle Button for Sidebar (Hamburger Icon) -->
    <button 
        id="sidebarToggle" 
        class="md:hidden bg-[#266867] text-white p-2 fixed top-4 left-4 z-20 rounded-md"
        aria-label="Toggle sidebar"
    >
        <!-- Hamburger Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
    </button>
    <!-- Sidebar -->
<div id="sidebar" class="inset-y-0 left-0 w-64 bg-[#266867] text-white p-6 space-y-4 transform md:translate-x-0 md:relative md:transform-none sm:hidden md:hidden lg:block transition-transform duration-300 min-[400px]:hidden">
    <h2 class="text-xl font-semibold mb-4 mt-4">Admin Dashboard</h2>
    <h3 class="text-md font-semibold mb-2">Manage Your Portfolio</h3>
    <ul class="space-y-2">
        <li><a href="{{ route('admin.contact_messages.index') }}" class="block p-2 rounded hover:bg-[#051821]">Messages</a></li>
        <li><a href="{{ route('admin.services.index1') }}" class="block p-2 rounded hover:bg-[#051821]">Manage Services</a></li>
        <li><a href="{{ route('admin.banners.index') }}" class="block p-2 rounded hover:bg-[#051821]">Banners</a></li>
        <li><a href="{{ route('admin.projects.index1') }}" class="block p-2 rounded hover:bg-[#051821]">Projects</a></li>
        <li><a href="{{ route('admin.reviews.index1') }}" class="block p-2 rounded hover:bg-[#051821]">Reviews</a></li>
        <li><a href="{{ route('admin.team_members.index1') }}" class="block p-2 rounded hover:bg-[#051821]">Team Members</a></li>
        <li><a href="{{ route('admin.site_info.index1') }}" class="block p-2 rounded hover:bg-[#051821]">Site Information</a></li>
        <li><a href="{{ route('admin.visitors.index') }}" class="block p-2 rounded hover:bg-[#051821]">Visitor Logs</a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="flex-1 md:ml-64 p-6 mt-4 md:w-auto sm:w-full">
    <div class="bg-white p-8 shadow rounded-lg">
        <h1 class="text-2xl text-center font-bold text-[#266867]">Admin Dashboard</h1>
        @yield('admin-content')
    </div>
</div>

</div>

<!-- Toggle Script for Sidebar -->
<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    });
</script>

</body>
</html>
@endsection