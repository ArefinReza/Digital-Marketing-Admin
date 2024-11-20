@extends('dashboard')

@section('admin-content')
<div class="container mx-auto max-w-3xl bg-white p-8 shadow-md rounded-lg">
    <h1 class="text-3xl font-semibold text-gray-700 mb-6">Admin Profile</h1>

    <!-- Display Success and Error Messages -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
        <strong>Success!</strong> {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
        <strong>Error!</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Update Profile Information -->
    <h3 class="text-xl font-medium text-gray-800 mt-6 mb-4">Update Profile Information</h3>
    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-600 font-semibold mb-1">Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div>
            <label class="block text-gray-600 font-semibold mb-1">Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <button type="submit" class="w-full mt-4 p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Update Profile</button>
    </form>

    <hr class="my-8">

    <!-- Update Password -->
    <h3 class="text-xl font-medium text-gray-800 mt-6 mb-4">Update Password</h3>
    <form action="{{ route('profile.password.update') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-600 font-semibold mb-1">Current Password:</label>
            <input type="password" name="current_password" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div>
            <label class="block text-gray-600 font-semibold mb-1">New Password:</label>
            <input type="password" name="password" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div>
            <label class="block text-gray-600 font-semibold mb-1">Confirm New Password:</label>
            <input type="password" name="password_confirmation" required class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <button type="submit" class="w-full mt-4 p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Update Password</button>
    </form>

    <hr class="my-8">
    <!-- Display All Users and Role Management for Admins -->
    @if(Auth::user()->role === 'admin')
    <h3 class="text-xl font-medium text-gray-800 mt-6 mb-4">Manage User Roles</h3>

    <table class="w-full text-left bg-white shadow-md rounded mb-6">
        <thead class="bg-[#266867] text-white">
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Role</th>
                <th class="py-2 px-4 border-b">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                <td class="py-2 px-4 border-b">{{ ucfirst($user->role) }}</td>
                <td class="py-2 px-4 border-b">

                    <form action="{{ route('profile.updateRole', $user->id) }}" method="POST">
                        @csrf
                        <!-- Role select field -->
                        <select name="role">
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                        <button type="submit" class="mt-4 p-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Update Role</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection