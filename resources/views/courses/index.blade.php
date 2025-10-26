@extends('layouts.app')
@section('title', 'All Mosque')
@section('content')

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">All Courses</h3>
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
                        <a href="#">Courses</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">All Courses</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">All Courses</h4>
                                <a
                                    href="{{ route('courses.create') }}"
                                    class="btn btn-primary btn-round ms-auto"
                                >
                                    <i class="fa fa-plus"></i>
                                    Add Courses
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    id="add-row"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Level</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $(function () {
            // Add Row
            $('#add-row').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('course.datatable') }}',
                "pagingType": "full_numbers",
                "lengthMenu": [[10, 25, 50, -1],[10, 25, 50, "All"]
                ],
                // columnDefs: [{ width: '40%', targets: 3 }],
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'title', name: 'title'},
                    {data: 'level', name: 'level'},
                    {data: 'price', name: 'price'},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action', orderable: false},
                ],
                "dom": 'lBfrtip',
                "buttons": [
                    {
                        "extend": "copy",
                        "text": "<i class='fas fa-copy'></i> Copy",
                        "className": "btn btn-primary bg-gradient-primary btn-sm"
                    },{
                        "extend": "csv",
                        "text": "<i class='fas fa-file-csv'></i> Export to CSV",
                        "className": "btn btn-primary bg-gradient-primary btn-sm"
                    },
                    {
                        "extend": "excel",
                        "text": "<i class='fas fa-file-excel'></i> Export to Excel",
                        "className": "btn btn-primary bg-gradient-primary btn-sm"
                    },

                    {
                        "extend": "print",
                        "text": "<i class='fas fa-print'></i> Print",
                        "className": "btn btn-primary bg-gradient-primary btn-sm"
                    },
                    {
                        "extend": "colvis",
                        "text": "<i class='fas fa-eye'></i> Column visibility",
                        "className": "btn btn-primary bg-gradient-primary btn-sm"
                    }
                ],
                "responsive": true, "autoWidth": false,"colReorder": true,
            });

            var action =
                '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

            $("#addRowButton").click(function () {
                $("#add-row")
                    .dataTable()
                    .fnAddData([
                        $("#addName").val(),
                        $("#addPosition").val(),
                        $("#addOffice").val(),
                        action,
                    ]);
                $("#addRowModal").modal("hide");
            });
        });
    </script>
@endpush
