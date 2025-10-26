<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title', 'Dashboard') | {{ config('app.name') }}</title>
    <meta
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        name="viewport"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('backend/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: { families: ["Public Sans:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('backend/assets/css/fonts.min.css') }}"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/kaiadmin.min.css') }}" />

    <!-- DataTables -->
    <link rel="stylesheet"
          href="{{ asset('backend/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('backend/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('backend/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- ColReorder CSS -->
    <link rel="stylesheet"  href="{{ asset('backend/assets/plugins/datatables-colreorder/css/colReorder.bootstrap4.min.css') }}">

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
        /* Media query for screens with a maximum width of 767 pixels (typical for mobile devices) */
        @media only screen and (max-width: 767px) {
            .wrapper-list-item {
                width: 45%;
            }
        }
    </style>
    @stack('style')
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
           @include('layouts.header')

            @yield('content')

            @include('layouts.footer')
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button
                                type="button"
                                class="selected changeLogoHeaderColor"
                                data-color="dark"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="blue"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="purple"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="light-blue"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="green"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="orange"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="red"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="white"
                            ></button>
                            <br />
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="dark2"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="blue2"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="purple2"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="light-blue2"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="green2"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="orange2"
                            ></button>
                            <button
                                type="button"
                                class="changeLogoHeaderColor"
                                data-color="red2"
                            ></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="dark"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="blue"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="purple"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="light-blue"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="green"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="orange"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="red"
                            ></button>
                            <button
                                type="button"
                                class="selected changeTopBarColor"
                                data-color="white"
                            ></button>
                            <br />
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="dark2"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="blue2"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="purple2"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="light-blue2"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="green2"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="orange2"
                            ></button>
                            <button
                                type="button"
                                class="changeTopBarColor"
                                data-color="red2"
                            ></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button
                                type="button"
                                class="changeSideBarColor"
                                data-color="white"
                            ></button>
                            <button
                                type="button"
                                class="selected changeSideBarColor"
                                data-color="dark"
                            ></button>
                            <button
                                type="button"
                                class="changeSideBarColor"
                                data-color="dark2"
                            ></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="icon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>
<!--   Core JS Files   -->
<script src="{{ asset('backend/assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/core/bootstrap.min.js') }}"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset('backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('backend/assets/js/plugin/chart.js/chart.min.js') }}"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset('backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Chart Circle -->
<script src="{{ asset('backend/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

<!-- Datatables -->
{{--<script src="{{ asset('backend/assets/js/plugin/datatables/datatables.min.js') }}"></script>--}}

<!-- Bootstrap Notify -->
<script src="{{ asset('backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset('backend/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/plugin/jsvectormap/world.js') }}"></script>

<!-- Sweet Alert -->
<script src="{{ asset('backend/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset('backend/assets/js/kaiadmin.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatables-colreorder/js/dataTables.colReorder.min.js') }}"></script>

    <script>
        $(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
    });

    $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
    });

    $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
    });
</script>
@stack('script')
</body>
</html>
