<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function Index()
    {
        return Review::all();
    }


    // Display all reviews for admin
    public function index1()
    {
        // $projects = Project::paginate(10);
        return view('admin.reviews.index', ['reviews' => Review::paginate(10)]);
    }

    // Show the form for creating a new review
    public function create()
    {
        if (Auth::user()->role !== 'user') {
            return view('admin.reviews.create');
        }
        return redirect()->route('admin.reviews.index1')->with('error', 'Access denied');
    }

    // Store a newly created review in the database
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'user') {
            $validatedData = $request->validate([
                'client_name' => 'required|string|max:255',
                'client_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'feedback' => 'required',
                'rating' => 'required|integer|between:1,5'
            ]);

            if ($request->hasFile('client_image')) {
                $imagePath = $request->file('client_image')->store('uploads', 'public');
                $validatedData['client_image'] = $imagePath;
            }

            Review::create($validatedData);

            return redirect()->route('admin.reviews.index1')->with('success', 'Review added successfully');
        }
        return redirect()->route('admin.reviews.index1')->with('error', 'Access denied');
    }

    // Display the specified review
    public function show($id)
    {
        $review = Review::findOrFail($id);
        return view('admin.reviews.show', compact('review'));
    }

    // Show the form for editing the specified review
    public function edit($id)
    {
        if (Auth::user()->role !== 'user') {
            $review = Review::findOrFail($id);
            return view('admin.reviews.edit', compact('review'));
        }
        return redirect()->route('admin.reviews.index1')->with('error', 'Access denied');
    }

    // Update the specified review in the database
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'user') {
            $review = Review::findOrFail($id);

            $validatedData = $request->validate([
                'client_name' => 'required|string|max:255',
                'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'feedback' => 'required',
                'rating' => 'required|integer|between:1,5'
            ]);

            if ($request->hasFile('client_image')) {
                $imagePath = $request->file('client_image')->store('uploads', 'public');
                $validatedData['client_image'] = $imagePath;

                if ($review->client_image && Storage::disk('public')->exists($review->client_image)) {
                    Storage::disk('public')->delete($review->client_image);
                }
            } else {
                $validatedData['client_image'] = $review->client_image;
            }

            $review->update($validatedData);

            return redirect()->route('admin.reviews.index1')->with('success', 'Review updated successfully');
        }
        return redirect()->route('admin.reviews.index1')->with('error', 'Access denied');
    }

    // Remove the specified review from the database
    public function destroy($id)
    {
        if (Auth::user()->role !== 'user') {
            $review = Review::findOrFail($id);
            $review->delete();

            return redirect()->route('admin.reviews.index1')->with('success', 'Review deleted successfully');
        }
        return redirect()->route('admin.reviews.index1')->with('error', 'Access denied');
    }
}
