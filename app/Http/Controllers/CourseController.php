<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'feature_video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:20480',
            'level' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'summary' => 'required|string',
            'feature_image' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        $featureImage = null;
        if ($request->hasFile('feature_image')) {
            $featureImage = $request->file('feature_image')->store('courses', 'public');
        }

        $featureVideo = null;
        if ($request->hasFile('feature_video')) {
            $featureVideo = $request->file('feature_video')->store('videos', 'public');
        }


        $course = Course::create([
            'title' => $request->input('title'),
            'feature_video' => $featureVideo,
            'level' => $request->input('level'),
            'category' => $request->input('category'),
            'price' => $request->input('price'),
            'summary' => $request->input('summary'),
            'feature_image' => $featureImage,
        ]);

        return redirect()->back()->with('success', 'Course created successfully!');
    }
}
