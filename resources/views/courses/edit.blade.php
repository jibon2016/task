@extends('backend.layouts.app')
@section('title', 'Edit Mosque')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Mosque</h3>
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
                        <a href="{{ route('mosque.index') }}">Mosques</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Mosques</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">মসজিদের তথ্য </div>
                        </div>

                        <form method="POST" action="{{ route('mosque.update', ['mosque' => $mosque->id ]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row px-3">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} row">
                                        <label for="name" class="col-sm-2 col-form-label">মসজিদের নাম <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('name', $mosque->name) }}" name="name" class="form-control" id="name" placeholder="মসজিদের নাম লিখুন ">
                                            <span id="name-error" class="help-block text-danger">{{ $errors->first('name') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }} row">
                                        <label for="address" class="col-sm-2 col-form-label">মসজিদের ঠিকানা  <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('address', $mosque->address) }}" name="address" class="form-control" id="address" placeholder="মসজিদের ঠিকানা লিখুন ">
                                            <span id="address-error" class="help-block text-danger">{{ $errors->first('address') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('google_map_url') ? 'has-error' : '' }} row">
                                        <label for="google_map_url" class="col-sm-2 col-form-label">গুগল ম্যাপ লিংক <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" value="{{ old('google_map_url', $mosque->google_map_url) }}" name="google_map_url" class="form-control" id="google_map_url" placeholder="গুগল মাপের শেয়ার লিংক পেস্ট করুন ">
                                            <span id="google_map_url-error" class="help-block text-danger">{{ $errors->first('google_map_url') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('establist_year') ? 'has-error' : '' }} row">
                                        <label for="establist_year" class="col-sm-2 col-form-label">প্রতিষ্ঠার তারিখ <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" value="{{ old('establist_year', $mosque->establist_year) }}" name="establist_year" class="form-control" id="establist_year" placeholder="প্রতিষ্ঠার তারিখ লিখুন">
                                            <span id="establist_year-error" class="help-block text-danger">{{ $errors->first('establist_year') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group {{ $errors->has('total_commitee_members') ? 'has-error' : '' }} row">
                                        <label for="total_commitee_members" class="col-sm-2 col-form-label">মোট কমিটির সদস্য <span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" value="{{ old('total_commitee_members', $mosque->total_commitee_members) }}" name="total_commitee_members" class="form-control" id="total_commitee_members" placeholder="মোট কমিটির সদস্য লিখুন">
                                            <span id="total_commitee_members-error" class="help-block text-danger">{{ $errors->first('total_commitee_members') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" >মসজিদের ছবি </label>
                                        <div class="col-sm-10">
                                            <div class="upload-container">
                                                <span class="flow-text" onclick="triggerFileInput()">সংযুক্তি ফাইলগুলি এখানে ক্লিক করুন অথবা টেনে আনুন এবং ছেড়ে দিন</span>
                                                <input type="file" accept=".jpg, .jpeg, .png" class="file-upload" name="attachments[]"
                                                       onchange="displayFilePreviews(this)" multiple>
                                            </div>

                                            <div id="file-previews" class="file-preview row">
                                                @foreach($mosque->attachments as $attachment)
                                                    @php
                                                        $pathExtension = pathinfo($attachment->file,PATHINFO_EXTENSION);
                                                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff', 'webp'];
                                                    @endphp
                                                    <div class="wrapper-list-item">
                                                        <input type="number" value="{{ $attachment->sort }}" placeholder="Sort" class="file-title-input old-file-sort-update">
                                                        @if(in_array($pathExtension,$imageExtensions))
                                                            <a download href="{{ asset($attachment->file) }}"><img class="preview-image" src="{{ asset($attachment->file) }}"></a>
                                                        @endif
                                                        <input type="hidden" value="{{ $attachment->id }}" class="attachment_id">
                                                        <div data-id="{{ $attachment->id }}" class="remove-button old-file-remove">Remove</div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <span id="attachments-error" class="text-danger error-message"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('mosque.index') }}" class="btn btn-danger">Cancel</a>
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
        $('body').on('click', '.old-file-remove', function() {
            let oldFileRemove = $(this);
            let attachmentId = $(this).data('id');
            if (confirm('are you sure delete?')){
                // preloaderToggle(true);

                $.ajax({
                    method: "post",
                    url: "{{ route('attachment-delete') }}",

                    data: { id: attachmentId }
                }).done(function( response ) {
                    oldFileRemove.closest('.wrapper-list-item').remove();
                    // preloaderToggle(false);
                }).error(function (error){
                    console.log(error)
                });
            }
        });
        $('body').on('focusout', '.old-file-sort-update', function() {
            let oldFileSortItem = $(this);
            let oldFileSort = $(this).val();

            let attachmentId = oldFileSortItem.closest('div').find('.attachment_id').val();
            $.ajax({
                method: "post",
                url: "{{ route('attachment-sort-update') }}",
                data: { id: attachmentId,sort:oldFileSort }
            }).done(function( response ) {
            });
        });

        function triggerFileInput() {
            const fileInput = document.querySelector('.file-upload');
            fileInput.click();
        }

        function addFileInput() {
            const newInput = document.createElement('input');
            newInput.type = 'file';
            newInput.classList.add('file-upload');
            newInput.multiple = false;
            newInput.onchange = function () {
                displayFilePreviews(newInput);
            };

            const filePreviews = document.getElementById('file-previews');
            filePreviews.appendChild(newInput);
        }

        function displayFilePreviews(input) {
            const fileInput = input;
            const filePreviews = document.getElementById('file-previews');
            const previewItem = document.createElement('div');
            previewItem.classList.add('file-preview');

            Array.from(fileInput.files).forEach(file => {
                // Add input field for file title
                const wrapperListItem = document.createElement('div');
                wrapperListItem.classList.add('wrapper-list-item');
                previewItem.appendChild(wrapperListItem);
                const sortInput = document.createElement('input');
                sortInput.type = 'number';
                sortInput.name = 'attachment_sort[]';
                sortInput.placeholder = 'Sort';
                sortInput.classList.add('file-title-input');

                wrapperListItem.appendChild(sortInput);


                if (file.type.startsWith('image/')) {
                    // Image preview
                    const previewImage = document.createElement('img');
                    previewImage.classList.add('preview-image');
                    previewImage.src = URL.createObjectURL(file);
                    wrapperListItem.appendChild(previewImage);
                } else if (file.type === 'application/pdf') {
                    // PDF preview
                    const previewPdf = document.createElement('div');
                    previewPdf.classList.add('preview-pdf');
                    previewPdf.textContent = 'PDF';
                    wrapperListItem.appendChild(previewPdf);
                } else {
                    // Other file types (e.g., documents)
                    const previewPdf = document.createElement('div');
                    previewPdf.classList.add('preview-pdf');
                    previewPdf.textContent = file.name;
                    wrapperListItem.appendChild(previewPdf);
                }

                // Add a remove button for each preview
                const removeButton = document.createElement('div');
                removeButton.classList.add('remove-button');
                removeButton.textContent = 'Remove';
                removeButton.onclick = function () {
                    fileInput.value = ''; // Clear the input
                    wrapperListItem.remove();
                };

                wrapperListItem.appendChild(removeButton);

                filePreviews.appendChild(wrapperListItem);
            });
        }
    </script>
@endpush
