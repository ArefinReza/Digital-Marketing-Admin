<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{

    public function Index()
    {
        return Banner::all();
    }


    // Display all banners
    public function index1()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    // Show the form for creating a new banner
    // Show the form for creating a new banner
    public function create()
    {
        if (Auth::user()->role !== 'user') {
            return view('admin.banners.create');
        }
        return redirect()->route('admin.banners.index')->with('error', 'Access denied');
    }

    // Store a new banner in the database
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'user') {
            $request->validate([
                'banner_image' => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'who_we_are' => 'required|string',
                'intro_video' => 'required|file|mimes:mp4,avi,mov|max:10240',
            ]);

            $bannerImagePath = $request->file('banner_image')->store('banners', 'public');
            $introVideoPath = $request->file('intro_video')->store('videos', 'public');

            Banner::create([
                'banner_image' => $bannerImagePath,
                'who_we_are' => $request->who_we_are,
                'intro_video' => $introVideoPath,
            ]);

            return redirect()->route('admin.banners.index')->with('success', 'Banner created successfully');
        }
        return redirect()->route('admin.banners.index')->with('error', 'Access denied');
    }

    // Show the form for editing an existing banner
    public function edit($id)
    {
        if (Auth::user()->role !== 'user') {
            $banner = Banner::findOrFail($id);
            return view('admin.banners.edit', compact('banner'));
        }
        return redirect()->route('admin.banners.index')->with('error', 'Access denied');
    }

    // Update an existing banner in the database
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'user') {
            $request->validate([
                'banner_image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
                'who_we_are' => 'required|string',
                'intro_video' => 'nullable|file|mimes:mp4,avi,mov|max:10240',
            ]);

            $banner = Banner::findOrFail($id);

            if ($request->hasFile('banner_image')) {
                Storage::disk('public')->delete($banner->banner_image);
                $banner->banner_image = $request->file('banner_image')->store('banners', 'public');
            }

            if ($request->hasFile('intro_video')) {
                Storage::disk('public')->delete($banner->intro_video);
                $banner->intro_video = $request->file('intro_video')->store('videos', 'public');
            }

            $banner->who_we_are = $request->input('who_we_are');
            $banner->save();

            return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully');
        }
        return redirect()->route('admin.banners.index')->with('error', 'Access denied');
    }

    // Delete a banner from the database
    public function destroy($id)
    {
        if (Auth::user()->role !== 'user') {
            $banner = Banner::findOrFail($id);
            Storage::disk('public')->delete([$banner->banner_image, $banner->intro_video]);
            $banner->delete();

            return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully');
        }
        return redirect()->route('admin.banners.index')->with('error', 'Access denied');
    }
}
