@extends('master')

@section('content')



<div class="content" id="content">
    <nav class="navbar navbar-light bg-white shadow-sm mb-4">
        <div class="container-fluid">
            <button class="btn btn-outline-primary" id="toggleSidebar">
                <i class="fa-solid fa-bars"></i>
            </button>
            <span class="navbar-brand ms-2">Create a Course</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row g-3">


            <div class="mt-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        Create a Course
                    </div>

                    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mt-2 mb-2">
                                    <div class="form-group">
                                        <label for="">Course Title<code>*</code></label>
                                        <input type="text" name="title" class="form-control">

                                        @error('title')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2 mb-2">
                                    <div class="form-group">
                                        <label for="">Feature Video<code>*</code></label>
                                        <input type="file" name="feature_video" class="form-control" accept="video/*">

                                        @error('feature_video')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2 mb-2">
                                    <div class="form-group">
                                        <label for="">Level<code>*</code></label>
                                        <input type="text" name="level" class="form-control">

                                        @error('level')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2 mb-2">
                                    <div class="form-group">
                                        <label for="">Category<code>*</code></label>
                                        <select name="category" id="" class="form-control">
                                            <option selected disabled>Choose</option>
                                            <option value="html">HTML</option>
                                            <option value="css">CSS</option>
                                            <option value="js">JS</option>
                                        </select>

                                        @error('category')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mt-2 mb-2">
                                    <div class="form-group">
                                        <label for="">Course Price<code>*</code></label>
                                        <input type="text" name="price" class="form-control">

                                        @error('price')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 mb-2">
                                    <div class="form-group">
                                        <label for="course_area">Course Summary <code>*</code></label>
                                        <textarea name="summary" class="form-control summernote"></textarea>

                                        @error('summary')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2 mb-2">
                                    <div class="form-group">
                                        <label for="course_area">Feature Image <code>*</code></label>
                                        <input type="file" name="feature_image" class="form-control">

                                        @error('feature_image')
                                        <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2 mb-2">
                                    <button type="button" id="addModuleBtn" class="btn btn-primary btn-sm">
                                        Add Module <i class="fa fa-plus-circle"></i>
                                    </button>
                                </div>

                                <div class="col-md-12 mt-2 mb-2">
                                    <div id="modulesList">
                                        <!-- Dynamic modules will appear here -->
                                    </div>
                                </div>

                                <div class="col-md-12 mt-2 mb-2">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            let moduleCount = 0;

            // Add new module
            $('#addModuleBtn').on('click', function() {
                moduleCount++;
                const moduleHtml = `
            <div class="card mt-3 module-item" id="module_${moduleCount}">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Module ${moduleCount}</h6>
                    <div>
                        <button type="button" class="btn btn-success btn-sm add-content" data-module="${moduleCount}">
                            <i class="bi bi-plus-circle"></i> Add Content
                        </button>
                        <button type="button" class="btn btn-danger btn-sm remove-module" data-id="${moduleCount}">
                            <i class="bi bi-trash"></i> Remove
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Module Title</label>
                        <input type="text" name="modules[${moduleCount}][title]" class="form-control" >
                    </div>

                    <!-- Content List -->
                    <div id="contentList_${moduleCount}"></div>
                </div>
            </div>
        `;
                $('#modulesList').append(moduleHtml);
            });

            // Remove a module
            $(document).on('click', '.remove-module', function() {
                const id = $(this).data('id');
                $('#module_' + id).remove();
            });

            // Add content inside a specific module
            $(document).on('click', '.add-content', function() {
                const moduleId = $(this).data('module');
                const contentList = $(`#contentList_${moduleId}`);
                const contentCount = contentList.children('.content-item').length + 1;

                const contentHtml = `
            <div class="border p-3 rounded mb-2 content-item" id="content_${moduleId}_${contentCount}">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong>Content ${contentCount}</strong>
                    <button type="button" class="btn btn-outline-danger btn-sm remove-content" data-module="${moduleId}" data-content="${contentCount}">
                        Remove
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-2">
                        <label class="form-label">Content Title</label>
                        <input type="text" name="modules[${moduleId}][contents][${contentCount}][title]" class="form-control" >
                    </div>

                    <div class="col-md-3 mb-2">
                        <label class="form-label">Video Source Type</label>
                        <select name="modules[${moduleId}][contents][${contentCount}][source_type]" class="form-select" >
                        
                            <option value="youtube">YouTube</option>
                            <option value="vimeo">Vimeo</option>
                            <option value="mp4">MP4 Upload</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-2">
                        <label class="form-label">Video URL</label>
                        <input type="text" name="modules[${moduleId}][contents][${contentCount}][video_url]" class="form-control" >
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Length (min)</label>
                        <input type="text" name="modules[${moduleId}][contents][${contentCount}][video_length]" class="form-control" placeholder="00:00" >
                    </div>
                </div>
            </div>
        `;

                contentList.append(contentHtml);
            });

            // Remove a specific content
            $(document).on('click', '.remove-content', function() {
                const moduleId = $(this).data('module');
                const contentId = $(this).data('content');
                $(`#content_${moduleId}_${contentId}`).remove();
            });
        });
    </script>




    @endsection