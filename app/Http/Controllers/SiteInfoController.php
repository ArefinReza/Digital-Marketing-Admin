<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteInfo;
use Illuminate\Support\Facades\Auth;

class SiteInfoController extends Controller
{
    public function index(){
        $result = SiteInfo::get();
        return $result;
    }//end method

    // Display the site info in the admin panel
    public function index1()
    {
        $siteInfo = SiteInfo::first(); // Assuming only one site info record
        return view('admin.site_info.index1', compact('siteInfo'));
    }

     // Show the form for editing the site info
     public function edit()
     {
         if (Auth::user()->role !== 'user') {
             $siteInfo = SiteInfo::first();
             return view('admin.site_info.edit', compact('siteInfo'));
         }
         return redirect()->route('admin.site_info.index1')->with('error', 'Access denied');
     }
 
     // Update site information
     public function update(Request $request)
     {
         if (Auth::user()->role !== 'user') {
             $data = $request->validate([
                 'sitename' => 'required|string',
                 'email' => 'required|string|email',
                 'phone_number' => 'required|string',
                 'about' => 'required|string',
                 'refund' => 'required|string',
                 'parchase_guide' => 'required|string',
                 'privacy' => 'required|string',
                 'address' => 'required|string',
                 'facebook_link' => 'required|string',
                 'twitter_link' => 'required|string',
                 'instagram_link' => 'required|string',
                 'copyright_text' => 'required|string'
             ]);
 
             $siteInfo = SiteInfo::first();
             $siteInfo->update($data);
 
             return redirect()->route('admin.site_info.index1')->with('success', 'Site information updated successfully');
         }
         return redirect()->route('admin.site_info.index1')->with('error', 'Access denied');
     }

} 
