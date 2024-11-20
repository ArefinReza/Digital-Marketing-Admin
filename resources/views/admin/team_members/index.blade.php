<!-- resources/views/admin/team_members/index.blade.php -->

@extends('dashboard')

@section('admin-content')
    <h1 class="text-2xl font-semibold text-[#266867] mb-6">All Team Members</h1>
    
    <a href="{{ route('admin.team_members.create') }}" class="inline-block mb-4 px-4 py-2 bg-[#F58800] text-white rounded hover:bg-[#051821]">Add New Team Member</a>

    @if(session('success'))
        <div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-[#B3D4D4] rounded-lg shadow-md">
        <thead>
            <tr class="bg-[#266867] text-white">
                <th class="p-4 text-left font-semibold">ID</th>
                <th class="p-4 text-left font-semibold">Name</th>
                <th class="p-4 text-left font-semibold">Role</th>
                <th class="p-4 text-left font-semibold">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teamMembers as $member)
                <tr class="border-b border-[#B3D4D4] hover:bg-[#F5F5F5]">
                    <td class="p-4 text-[#051821]">{{ $member->id }}</td>
                    <td class="p-4 text-[#051821]">{{ $member->name }}</td>
                    <td class="p-4 text-[#051821]">{{ $member->role }}</td>
                    <td class="p-4 flex gap-2">
                        <a href="{{ route('admin.team_members.show', $member->id) }}" class="px-3 py-1 bg-[#266867] text-white rounded hover:bg-[#051821]">View</a>
                        <a href="{{ route('admin.team_members.edit', $member->id) }}" class="px-3 py-1 bg-[#F58800] text-white rounded hover:bg-[#051821]">Edit</a>
                        <form action="{{ route('admin.team_members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $teamMembers->links('pagination::bootstrap-4') }}
    </div>
@endsection
