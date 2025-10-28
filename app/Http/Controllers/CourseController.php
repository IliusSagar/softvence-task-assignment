<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;

class CourseController extends Controller
{
    public function create()
    {
        return view('course.create');
    }

    public function store(StoreCourseRequest  $request)
    {
        $validated = $request->validated();

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
        if ($request->modules) {
            foreach ($request->modules as $moduleData) {
                $module = Module::create([
                    'course_id' => $course->id,
                    'title' => $moduleData['title'] ?? 'Untitled Module',
                ]);

                // ✅ Move inside module loop
                if (!empty($moduleData['contents'])) {
                    foreach ($moduleData['contents'] as $contentData) {
                        Content::create([
                            'module_id' => $module->id,
                            'title' => $contentData['title'] ?? 'Untitled Content',
                            'source_type' => $contentData['source_type'] ?? null,
                            'video_url' => $contentData['video_url'] ?? null,
                            'video_length' => $contentData['video_length'] ?? null,
                        ]);
                    }
                }
            }
        }


        return redirect()->back()->with('success', 'Course created successfully!');
    }
}
