<!doctype html>
<html lang="{{ config('app.locale') }}" dir="rtl">

<head>
    {!! SEO::generate() !!}
    @include('_layouts.front.includes.styles')
    @stack('page-styles')
    @stack('styles')
</head>

<body class="text-justify" data-spy="scroll" data-target=".onpage-navigation" data-offset="60">

<div id="main-container">
    @include('_layouts.front.includes.header')
</div>

@yield('content')

@include('_layouts.front.includes.footer')

@include('_layouts.front.includes.scripts')
@stack('top-scripts')
@stack('page-scripts')
@stack('scripts')
</body>

</html>
