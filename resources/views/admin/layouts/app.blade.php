@extends('admin.layouts.base')
@section('base_content')
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
            @include('admin.layouts.navbar')
            @include('admin.layouts.sidebar')

        <div class="main-content">
            @yield('content')
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; {{ env('APP_NAME') }} 2018
            </div>
            <div class="footer-right"></div>
        </footer>
    </div>

</div>
@endsection


