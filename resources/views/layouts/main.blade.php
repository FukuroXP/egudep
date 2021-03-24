<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from admin.pixelstrap.com/cuba/theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Feb 2021 15:02:51 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('images/logo/logo-icon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/logo/logo-icon.png') }}" type="image/x-icon">
    <title>E-Gudep</title>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-pro/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('icofont/icofont.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/themify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/flag-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/bootstrap.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/dropzone.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatable-extension.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('css/color-1.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
{{--    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/decoupled-document/ckeditor.js"></script>--}}
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>

</head>
<body onload="startTime()">
@if(Session::has('success'))
    <script>
        window.onload = function() {
            Swal.fire(
                'Berhasil!',
                '{{ Session::get('success') }}',
                'success'
            )}
    </script>
@endif
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<div class="page-wrapper compact-wrapper" id="pageWrapper">
@include('layouts.header')
@yield('content')
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright 2021 © E-Gudep by Titin Sriyani <3  </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

<script>
    function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form;
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang telah dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {

                form.submit();
            }
        });
    }
</script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('js/icons/feather-icon/feather-icon.js') }}"></script>
<script src="{{ asset('js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('js/scrollbar/custom.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('js/sidebar-menu.js') }}"></script>
<script src="{{ asset('js/chart/chartist/chartist.js') }}"></script>
<script src="{{ asset('js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
<script src="{{ asset('js/chart/knob/knob.min.js') }}"></script>
<script src="{{ asset('js/chart/knob/knob-chart.js') }}"></script>
{{--<script src="{{ asset('js/chart/apex-chart/apex-chart.js') }}"></script>--}}
{{--<script src="{{ asset('js/chart/apex-chart/stock-prices.js') }}"></script>--}}
{{--<script src="{{ asset('js/notify/bootstrap-notify.min.js') }}"></script>--}}
<script src="{{ asset('js/dashboard/default.js') }}"></script>
{{--<script src="{{ asset('js/notify/index.js') }}"></script>--}}
{{--<script src="{{ asset('js/datepicker/date-picker/datepicker.js') }}"></script>--}}
{{--<script src="{{ asset('js/datepicker/date-picker/datepicker.en.js') }}"></script>--}}
{{--<script src="{{ asset('js/datepicker/date-picker/datepicker.custom.js') }}"></script>--}}
<script src="{{ asset('js/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('js/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('js/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('js/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('js/typeahead-search/typeahead-custom.js') }}"></script>
<script src="{{ asset('js/tooltip-init.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
{{--<script src="{{ asset('js/theme-customizer/customizer.js') }}"></script>--}}

{{--<script src="{{ asset('js/editor/ckeditor/ckeditor.js') }}"></script>--}}
{{--<script src="{{ asset('js/editor/ckeditor/adapters/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('js/dropzone/dropzone.js') }}"></script>--}}
{{--<script src="{{ asset('js/dropzone/dropzone-script.js') }}"></script>--}}
{{--<script src="{{ asset('js/select2/select2.full.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/select2/select2-custom.js') }}"></script>--}}
<script src="{{ asset('js/email-app.js') }}"></script>
<script src="{{ asset('js/form-validation-custom.js') }}"></script>

<script src="{{ asset('js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/jszip.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
{{--<script src="{{ asset('js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>--}}
<script src="{{ asset('js/datatable/datatable-extension/custom.js') }}"></script>
</body>

</html>
