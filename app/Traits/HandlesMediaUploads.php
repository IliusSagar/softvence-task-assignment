<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait HandlesMediaUploads
{
    /**
     * Upload an image file to storage and return its path.
     */
    public function uploadImage(Request $request, string $inputName, string $folder = 'courses'): ?string
    {
        if ($request->hasFile($inputName)) {
            return $request->file($inputName)->store($folder, 'public');
        }
        return null;
    }

    /**
     * Upload a video file to storage and return its path.
     */
    public function uploadVideo(Request $request, string $inputName, string $folder = 'videos'): ?string
    {
        if ($request->hasFile($inputName)) {
            return $request->file($inputName)->store($folder, 'public');
        }
        return null;
    }
}
