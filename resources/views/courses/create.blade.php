@extends('layouts.app')
@section('title', 'Create Courses')
@push('style')
    <style>
        .upload-container {
            text-align: center;
            padding: 20px;
            border: 2px dashed #3498db;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .file-upload {
            display: none;
        }


        .preview-image {
            width: 100%;
            max-height: 100px;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            object-fit: contain;
        }

        .preview-pdf {
            width: 100%;
            height: 100px;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .file-title-input {
            font-size: 14px;
            margin-top: 10px;
            width: 100%;
            padding: 4px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 14px;
        }

        .remove-button {
            color: #e74c3c;
            cursor: pointer;
            margin-top: 10px;
        }
        .wrapper-list-item {
            display: inline-block;
            width: 18%;
            margin: 1%;
            text-align: center;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Create Courses</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('courses.index') }}">Courses</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Create Courses</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Courses Details</div>
                        </div>

                        <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row px-3">
                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} row">
                                        <label for="title" class="col-sm-2 col-form-label">Course Title  <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" id="title" placeholder="Enter Course Title">
                                            <span id="title-error" class="help-block text-danger">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('level') ? 'has-error' : '' }} row">
                                        <label for="level" class="col-sm-2 col-form-label">Level  <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('level') }}" name="level" class="form-control" id="level" placeholder="Enter Level">
                                            <span id="level-error" class="help-block text-danger">{{ $errors->first('level') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }} row">
                                        <label for="price" class="col-sm-2 col-form-label">Course Price <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('price') }}" name="price" class="form-control" id="price" placeholder="Enter Course Price">
                                            <span id="price-error" class="help-block text-danger">{{ $errors->first('price') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }} row">
                                        <label for="description" class="col-sm-2 col-form-label">Course Description <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <textarea type="date" value="{{ old('description') }}" name="description" class="form-control" id="description" ></textarea>
                                            <span id="description-error" class="help-block text-danger">{{ $errors->first('description') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a href="{{ route('courses.index') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>

    </script>
@endpush
