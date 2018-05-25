<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
          name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    <link rel="stylesheet" href="{{ asset('distAdmin/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('distAdmin/modules/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet"
          href="{{ asset('distAdmin/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('distAdmin/modules/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('distAdmin/modules/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('distAdmin/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('distAdmin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('distAdmin/modules/toastr/build/toastr.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}

</head>
<body>
<a href="/" class="btn btn-default fa fa-home ">返回首页</a>

@yield('base_content')

<script src="{{ asset('distAdmin/modules/jquery.min.js') }}"></script>
<script src="{{ asset('distAdmin/modules/popper.js') }}"></script>
<script src="{{ asset('distAdmin/modules/tooltip.js') }}"></script>
<script src="{{ asset('distAdmin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('distAdmin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('distAdmin/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
<script src="{{ asset('distAdmin/js/sa-functions.js') }}"></script>
<script src="{{ asset('distAdmin/modules/chart.min.js') }}"></script>
<script src="{{ asset('distAdmin/modules/summernote/summernote-lite.js') }}"></script>
<script src="{{ asset('distAdmin/js/scripts.js') }}"></script>
<script src="{{ asset('distAdmin/js/custom.js') }}"></script>
<script src="{{ asset('distAdmin/js/demo.js') }}"></script>
<script src="{{ asset('distAdmin/modules/toastr/build/toastr.min.js') }}"></script>
{{--<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>--}}
@yield('admin-js')
</body>
</html>