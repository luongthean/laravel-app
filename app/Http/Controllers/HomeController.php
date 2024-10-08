<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the image in the S3 bucket
        $path = $request->file('image')->store('images', 's3');

        // Get the full URL of the uploaded file
        $url = Storage::disk('s3')->url($path);
        Image::create(['url' => $url]);

        // Return a response with the file URL or redirect to the form with the URL
        return redirect()->route('upload.form')->with('url', $url);
    }
}
