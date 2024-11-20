<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Admin Panel') }}</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRy8Sxou1lvH3vBNsA8XAS33shhV5e6Jj5f2bYB/g" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <div class="admin-panel">
    @livewire('navigation-menu')
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <!-- <h2>Admin Panel</h2> -->
            </div>
            <ul class="sidebar-menu">
                <!-- <li><a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="{{ route('profile.show') }}"><i class="fas fa-user"></i> Profile</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a></li> -->
            </ul>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </aside>

        <!-- Main Content Area -->
        <div class="main-content">
            <header class="main-header">
                <!-- <h1>{{ $title ?? 'Admin Dashboard' }}</h1> -->
            </header>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Content Section -->
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Link to JavaScript (if any) -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>