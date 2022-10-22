<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.styles')
    @stack('addon-styles')
</head>

<body>
    @include('includes.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
    </div>
    @include('sweetalert::alert')
    @include('includes.scripts')
    @stack('addon-scripts')
</body>

</html>
