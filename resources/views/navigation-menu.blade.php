<head>
<style>
    /* Make navbar sticky and change color on scroll */
    nav {
        position: sticky;
        top: 0;
        background-color: #2c7a7b;
        transition: background-color 0.3s ease-in-out;
        padding: 5px;
        
    }
    #drop{
        background-color: #1a46457d;
    }
    
    
</style>
</head>
<nav x-data="{ open: false, dropdownOpen: false }" @scroll.window="open = true" class="bg-teal-600 text-stone-50 fixed top-0 w-full z-50 transition-colors duration-300 ease-in-out">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <x-application-mark class="block h-9 w-auto text-white" />
                    <span class="text-lg font-bold text-white">Moon IT DIGITAL MARKETING</span>
                </a>
            </div>

            <!-- Links for Desktop -->
            <div class="hidden space-x-8 sm:flex">
    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="text-white hover:text-gray-800">
        {{ __('Dashboard') }}
    </x-nav-link>
    <x-nav-link href="{{ route('admin.contact_messages.index') }}" :active="request()->routeIs('messages')" class="text-white hover:text-gray-800">
        {{ __('Messages') }}
    </x-nav-link>

    <!-- Dropdown for Projects -->
    <div x-data="{ projectsOpen: false }" @mouseenter="projectsOpen = true" @mouseleave="projectsOpen = false" class="relative">
        <x-nav-link href="#" class="text-white hover:text-gray-800 cursor-pointer">
            {{ __('Projects') }}
        </x-nav-link>
        <div x-show="projectsOpen" id="drop" class="absolute rounded-lg shadow-lg py-2 mt-1 w-48 z-10" @click.away="projectsOpen = false">
            <a href="{{ route('admin.projects.index1') }}" class="block px-4 py-2 hover:bg-teal-600 hover:text-gray-800">All Projects</a>
            <a href="{{ route('admin.projects.create') }}" class="block px-4 py-2 hover:bg-teal-600 hover:text-gray-800">Create Projects</a>
        </div>
    </div>

    <!-- Dropdown for Services -->
    <div x-data="{ servicesOpen: false }" @mouseenter="servicesOpen = true" @mouseleave="servicesOpen = false" class="relative">
        <x-nav-link href="#" class="text-white hover:text-gray-800 cursor-pointer">
            {{ __('Services') }}
        </x-nav-link>
        <div x-show="servicesOpen" id="drop" class="absolute rounded-lg shadow-lg py-2 mt-1 w-48 z-10" @click.away="servicesOpen = false">
            <a href="{{ route('admin.services.index1') }}" class="block px-4 py-2 hover:bg-teal-600 hover:text-gray-800">All Services</a>
            <a href="{{ route('admin.services.create') }}" class="block px-4 py-2 hover:bg-teal-600 hover:text-gray-800">Create Services</a>
        </div>
    </div>

    <!-- Dropdown for Reviews -->
    <div x-data="{ reviewsOpen: false }" @mouseenter="reviewsOpen = true" @mouseleave="reviewsOpen = false" class="relative">
        <x-nav-link href="#" class="text-white hover:text-gray-800 cursor-pointer">
            {{ __('Reviews') }}
        </x-nav-link>
        <div x-show="reviewsOpen" id="drop" class="absolute rounded-lg shadow-lg py-2 mt-1 w-48 z-10" @click.away="reviewsOpen = false">
            <a href="{{ route('admin.reviews.index1') }}" class="block px-4 py-2 hover:bg-teal-600 hover:text-gray-800">All Reviews</a>
            <a href="{{ route('admin.reviews.create') }}" class="block px-4 py-2 hover:bg-teal-600 hover:text-gray-800">Create Review</a>
        </div>
    </div>

    <div x-data="{ teamMembersOpen: false }" @mouseenter="teamMembersOpen = true" @mouseleave="teamMembersOpen = false" class="relative">
        <x-nav-link href="#" class="text-white hover:text-gray-800 cursor-pointer">
            {{ __('Team Members') }}
        </x-nav-link>
        <div x-show="teamMembersOpen" id="drop" class="absolute rounded-lg shadow-lg py-2 mt-1 w-48 z-10" @click.away="teamMembersOpen = false">
            <a href="{{ route('admin.team_members.index1') }}" class="dropdown-item">All Team Members</a>
            <a href="{{ route('admin.team_members.create') }}" class="dropdown-item">Create Team Member</a>
        </div>
    </div>
</div>


            <!-- User Dropdown & Profile -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-gray-800 hover:text-white focus:outline-none focus:bg-gray-700 transition ease-in-out duration-150">
                                    {{ Auth::user()->name }}
                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <div class="border-t border-gray-600"></div>

                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>

            <!-- Hamburger for Mobile -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-100 hover:bg-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="sm:hidden bg-gray-800 text-white">
        <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link href="{{ route('admin.projects.index1') }}" :active="request()->routeIs('admin.projects.index')">
            {{ __('Projects') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link href="{{ route('admin.services.index1') }}" :active="request()->routeIs('admin.services.index')">
            {{ __('Services') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link href="{{ route('admin.reviews.index1') }}" :active="request()->routeIs('admin.reviews.index')">
            {{ __('Reviews') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link href="{{ route('admin.team_members.index1') }}" :active="request()->routeIs('admin.team_members.index')">
            {{ __('Teams') }}
        </x-responsive-nav-link>
    </div>
</nav>
<script>
    /* Change color when scrolled */
    window.onscroll = function() {
        const nav = document.querySelector('nav');
        if (window.scrollY > 50) {
            nav.classList.add('bg-gray-800');
        } else {
            nav.classList.remove('bg-gray-800');
        }
    };
</script>


