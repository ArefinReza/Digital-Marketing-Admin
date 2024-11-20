<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TeamMemberController extends Controller
{
    public function index()
    {
        return TeamMember::all();
    }

    public function show($id)
    {
        return TeamMember::findOrFail($id);
    }


    // Display all team members for admin
    public function index1()
    {
        return view('admin.team_members.index', ['teamMembers' => TeamMember::paginate(10)]);
    }

    // Show the form for creating a new team member
    public function create()
    {
        if (Auth::user()->role !== 'user') {
            return view('admin.team_members.create');
        }
        return redirect()->route('admin.team_members.index1')->with('error', 'Access denied');
    }

    // Store a newly created team member in the database
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'user') {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'portfolio' => 'nullable|string',
                'photo_url' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
                'email' => 'nullable|email',
                'facebookLink' => 'nullable|string',
                'linkedinLink' => 'nullable|string',
                'phonenumber' => 'nullable|string',
                'whatsapp' => 'nullable|string',
                'education' => 'nullable|string',
                'skills' => 'nullable|string',
                'experience' => 'nullable|string'
            ]);

            if ($request->hasFile('photo_url')) {
                $imagePath = $request->file('photo_url')->store('uploads/team_members', 'public');
                $validatedData['photo_url'] = $imagePath;
            }

            TeamMember::create($validatedData);

            return redirect()->route('admin.team_members.index1')->with('success', 'Team member added successfully');
        }
        return redirect()->route('admin.team_members.index1')->with('error', 'Access denied');
    }

    // Display the specified team member
    public function show1($id)
    {
        $teamMember = TeamMember::findOrFail($id);
        return view('admin.team_members.show', compact('teamMember'));
    }

    // Show the form for editing the specified team member
    public function edit($id)
    {
        if (Auth::user()->role !== 'user') {
            $teamMember = TeamMember::findOrFail($id);
            return view('admin.team_members.edit', compact('teamMember'));
        }
        return redirect()->route('admin.team_members.index1')->with('error', 'Access denied');
    }

    // Update the specified team member in the database
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'user') {
            $teamMember = TeamMember::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'role' => 'required|string|max:255',
                'portfolio' => 'nullable|string',
                'photo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'email' => 'nullable|email',
                'facebookLink' => 'nullable|string',
                'linkedinLink' => 'nullable|string',
                'phonenumber' => 'nullable|string',
                'whatsapp' => 'nullable|string',
                'education' => 'nullable|string',
                'skills' => 'nullable|string',
                'experience' => 'nullable|string'
            ]);

            if ($request->hasFile('photo_url')) {
                $imagePath = $request->file('photo_url')->store('uploads/team_members', 'public');
                $validatedData['photo_url'] = $imagePath;
            }

            $teamMember->update($validatedData);

            return redirect()->route('admin.team_members.index1')->with('success', 'Team member updated successfully');
        }
        return redirect()->route('admin.team_members.index1')->with('error', 'Access denied');
    }

    // Remove the specified team member from the database
    public function destroy($id)
    {
        if (Auth::user()->role !== 'user') {
            $teamMember = TeamMember::findOrFail($id);
            $teamMember->delete();

            return redirect()->route('admin.team_members.index1')->with('success', 'Team member deleted successfully');
        }
        return redirect()->route('admin.team_members.index1')->with('error', 'Access denied');
    }
}