@extends('layouts.app')
@section('title', 'Edit Course')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Course</h3>
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
                        <a href="#">Edit Courses</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Course Details</div>
                        </div>

                        <form method="POST" action="{{ route('courses.update') }}" enctype="multipart/form-data">
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
                                            <input type="number" value="{{ old('level') }}" name="level" class="form-control" id="level" placeholder="Enter Level">
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

                                    <div class="col-sm-12">
                                        <button type="button" style="margin-top: 31px;" id="add_new_module_btn" class="btn btn-info bg-gradient-info btn-md btn-block"><i class="fa fa-plus"></i>Add Module</button>
                                    </div>
                                    <div class="py-2" id="module-container">

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

            <template id="template-module">
                <div class="accordion py-2 module-accordion" data-module-index="__MID__">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button">
                                Module <span class="module-count mx-2">__MID_DISPLAY__</span>
                                <span type="button" class="mx-2 btn btn-danger btn-sm btn-remove">Remove</span>
                            </button>
                        </h2>
                        <div class="accordion-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Module Title <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="modules[__MID__][title]" class="form-control module-title" placeholder="Enter Module Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Module Desc</label>
                                <div class="col-sm-10">
                                    <textarea name="modules[__MID__][desc]" class="form-control module-desc"></textarea>
                                </div>
                            </div>

                            <div class="content-container">
                                <button type="button" class="btn btn-primary btn-sm add-content-btn">Add Content</button>
                                <div class="content-accordion mt-3" data-content-count="0">
                                    <!-- content items will be appended here -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Content template -->
            <template id="template-content">
                <div class="accordion-item" data-content-index="__CID__">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button">
                            Content <span class="content-count mx-1">__CID_DISPLAY__</span>
                            <span type="button" class="mx-2 btn btn-danger btn-sm btn-remove-content">Remove</span>
                        </button>
                    </h2>
                    <div class="accordion-body">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Content Title <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="modules[__MID__][contents][__CID__][title]" class="form-control content-title" placeholder="Enter Content Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Content Desc</label>
                            <div class="col-sm-10">
                                <textarea name="modules[__MID__][contents][__CID__][desc]" class="form-control content-desc"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(function () {
            // initialize from any old input count if needed (server can emit count)
            let moduleCounter = 0;

            function reindex() {
                // Reindex modules and their contents so names become contiguous: modules[0], modules[1], ...
                $('#module-container').children('.module-accordion').each(function (mIndex) {
                    const $mod = $(this);
                    $mod.attr('data-module-index', mIndex);
                    $mod.find('.module-count').text(mIndex + 1);

                    // update module-level input names
                    $mod.find('[name]').each(function () {
                        const $el = $(this);
                        // update only our module/content fields that contain 'modules'
                        let name = $el.attr('name');
                        if (!name) return;
                        // replace first modules\[\d+\] with modules[mIndex]
                        name = name.replace(/modules\[\d+\]/, 'modules[' + mIndex + ']');
                        // also update content indices below if present -- leave them for content loop
                        $el.attr('name', name);
                    });

                    // Reindex contents inside this module
                    $mod.find('.content-accordion').each(function () {
                        const $contentContainer = $(this);
                        $contentContainer.children('[data-content-index]').each(function (cIndex) {
                            const $c = $(this);
                            $c.attr('data-content-index', cIndex);
                            $c.find('.content-count').text(cIndex + 1);

                            $c.find('[name]').each(function () {
                                const $el = $(this);
                                let name = $el.attr('name');
                                if (!name) return;
                                // ensure module index is correct
                                name = name.replace(/modules\[\d+\]/, 'modules[' + mIndex + ']');
                                // replace contents index
                                name = name.replace(/contents\[\d+\]/, 'contents[' + cIndex + ']');
                                $el.attr('name', name);
                            });
                        });
                        // update data-content-count attribute
                        $contentContainer.attr('data-content-count', $contentContainer.children('[data-content-index]').length);
                    });
                });
                moduleCounter = $('#module-container').children('.module-accordion').length;
            }

            // Add module
            $('body').on('click', '#add_new_module_btn', function () {
                const mid = moduleCounter;
                let tpl = $('#template-module').html();
                tpl = tpl.replace(/__MID__/g, mid).replace(/__MID_DISPLAY__/g, mid + 1);
                $('#module-container').append(tpl);
                moduleCounter++;
                reindex();
                return false;
            });

            // Remove module
            $('body').on('click', '.btn-remove', function () {
                $(this).closest('.module-accordion').remove();
                reindex();
            });

            // Add content inside a module
            $('body').on('click', '.add-content-btn', function () {
                const $module = $(this).closest('.module-accordion');
                const mid = parseInt($module.attr('data-module-index') || 0, 10);
                const $contentContainer = $module.find('.content-accordion');
                const cid = parseInt($contentContainer.attr('data-content-count') || $contentContainer.children().length, 10);
                let tpl = $('#template-content').html();
                tpl = tpl.replace(/__MID__/g, mid).replace(/__CID__/g, cid).replace(/__CID_DISPLAY__/g, cid + 1);
                $contentContainer.append(tpl);
                $contentContainer.attr('data-content-count', cid + 1);
                reindex();
            });

            // Remove content
            $('body').on('click', '.btn-remove-content', function () {
                $(this).closest('[data-content-index]').remove();
                reindex();
            });

            // run once on page load if there are pre-rendered modules (optional)
            reindex();
        });
    </script>
@endpush
