<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    // Show Profile View
    public function show()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Update Profile Information
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    // Update Password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password does not match.']);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    // Update Permissions
    public function updatePermissions(Request $request)
    {
        $request->validate([
            'role' => 'required|in:admin,user', // Customize roles as needed
        ]);

        $user = Auth::user();
        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Permissions updated successfully.');
    }

    public function showProfile()
    {
        $users = User::all(); // Retrieve all users
        $user = auth()->user(); // Get the authenticated user
        return view('profile', compact('users', 'user')); // Pass $users and $user to the view
    }

    public function updateUserRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'role' => 'required|string',
        ]);
        $user->role = $request->input('role');
        $user->save();

        return redirect()->back()->with('success', 'User role updated successfully.');
    }
}
