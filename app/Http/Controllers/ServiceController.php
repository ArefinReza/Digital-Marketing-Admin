<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class ServiceController extends Controller
{
    public function index()
    {
        return Service::all();
    }

    public function index1()
{
    $services = Service::all(); // Or your model query
    return view('admin.services.index', compact('services'));
}

 // Show form for creating a new service
 public function create()
 {
     if (Auth::user()->role !== 'user') {
         return view('admin.services.create');
     }
     return redirect()->route('admin.services.index1')->with('error', 'Access denied');
 }

 // Store a new service in the database
 public function store(Request $request)
 {
     if (Auth::user()->role !== 'user') {
         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required|string',
             'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);

         $path = $request->file('icon')->store('icons', 'public');

         Service::create([
             'title' => $request->title,
             'description' => $request->description,
             'icon_url' => $path,
         ]);

         return redirect()->route('admin.services.index1')->with('success', 'Service created successfully');
     }
     return redirect()->route('admin.services.index1')->with('error', 'Access denied');
 }

 // Show form for editing an existing service
 public function edit($id)
 {
     if (Auth::user()->role !== 'user') {
         $service = Service::findOrFail($id);
         return view('admin.services.edit', compact('service'));
     }
     return redirect()->route('admin.services.index1')->with('error', 'Access denied');
 }

 // Update an existing service in the database
 public function update(Request $request, $id)
 {
     if (Auth::user()->role !== 'user') {
         $service = Service::findOrFail($id);

         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required|string',
             'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);

         $service->title = $request->input('title');
         $service->description = $request->input('description');

         if ($request->hasFile('icon')) {
             if ($service->icon_url) {
                 Storage::delete('public/' . $service->icon_url);
             }

             $iconPath = $request->file('icon')->store('icons', 'public');
             $service->icon_url = $iconPath;
         }

         $service->save();

         return redirect()->route('admin.services.index1')->with('success', 'Service updated successfully');
     }
     return redirect()->route('admin.services.index1')->with('error', 'Access denied');
 }

 // Delete a service from the database
 public function destroy($id)
 {
     if (Auth::user()->role !== 'user') {
         $service = Service::findOrFail($id);
         $service->delete();

         return redirect()->route('admin.services.index1')->with('success', 'Service deleted successfully');
     }
     return redirect()->route('admin.services.index1')->with('error', 'Access denied');
 }
}
