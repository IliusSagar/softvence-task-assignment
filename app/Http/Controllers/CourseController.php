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
            // 'feature_video' => 'required|string',
            // 'level' => 'required|string',
            // 'category' => 'required|string',
            // 'price' => 'required|numeric',
            // 'summary' => 'required|string',
            // 'feature_image' => 'required|file|mimes:jpg,jpeg,png'
        ]);

        $course = Course::create([
            'title' => $request->input('title'),
            // 'feature_video' => $request->input('feature_video'),
            // 'level' => $request->input('level'),
            // 'category' => $request->input('category'),
            // 'price' => $request->input('price'),
            // 'summary' => $request->input('summary'),
            // 'feature_image' => $featureImage,
        ]);

        return redirect()->back()->with('success', 'Course created successfully!');

        
    }
}
