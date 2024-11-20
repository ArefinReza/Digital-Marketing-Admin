<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create($validatedData);

        return response()->json(['message' => 'Contact message sent successfully!'], 200);
    }


    // Restrict viewing messages for users with "user" role
    public function index()
    {
        if (Auth::user()->role === 'user') {
            return redirect()->route('dashboard')->with('error', 'Access denied');
        }

        $messages = ContactMessage::orderBy('id', 'desc')->paginate(10);
        return view('admin.contact_messages.index', compact('messages'));
    }

    public function show($id)
    {
        if (Auth::user()->role === 'user') {
            return redirect()->route('dashboard')->with('error', 'Access denied');
        }

        $message = ContactMessage::findOrFail($id);
        return view('admin.contact_messages.show', compact('message'));
    }
}