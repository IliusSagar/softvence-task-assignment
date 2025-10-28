<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'feature_video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg|max:20480',
            'level' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'summary' => 'required|string',
            'feature_image' => 'nullable|file|mimes:jpg,jpeg,png',
        ];
    }
}
