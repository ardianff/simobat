<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>
<link rel="shortcut icon" href="{{ url('assets/img/logo.png') }}" type="image/x-icon" />
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
{{-- Vendor Css --}}
<link rel="stylesheet" href="{{ url('vendors/simplebar/css/simplebar.css') }}">
<link rel="stylesheet" href="{{ url('css/vendors/simplebar.css') }}">
<link href="{{ url('css/style.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
<link href="{{ url('css/examples.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">
