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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mt-2 mb-2">
                                <div class="form-group">
                                    <label for="">Course Title<code>*</code></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6 mt-2 mb-2">
                                <div class="form-group">
                                    <label for="">Feature Video<code>*</code></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-2 mb-2">
                                <div class="form-group">
                                    <label for="">Level<code>*</code></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4 mt-2 mb-2">
                                <div class="form-group">
                                    <label for="">Category<code>*</code></label>
                                    <select name="" id="" class="form-control">
                                        <option value="" selected disabled>Choose</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2 mb-2">
                                <div class="form-group">
                                    <label for="">Course Price<code>*</code></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 mt-2 mb-2">
                                <div class="form-group">
                                    <label for="course_area">Course Summary <code>*</code></label>
                                    <textarea class="form-control summernote"></textarea>

                                </div>
                            </div>

                            <div class="col-md-12 mt-2 mb-2">
                                <div class="form-group">
                                    <label for="course_area">Feature Image <code>*</code></label>
                                    <input type="file" class="form-control">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    @endsection