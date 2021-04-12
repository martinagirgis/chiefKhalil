<html>
<head>
    <title>App Name - @yield('title')</title>
</head>
@section('header')
    @include('admin.includes.header')
@show
<body>
    @include('admin.includes.structure.pre_loader')
</div>

<div class="header">
    @include('admin.includes.structure.header')
</div>
<div class="right-sidebar">
    @include('admin.includes.structure.settings')
</div>

<div class="left-side-bar">
    @include('admin.includes.structure.main')
</div>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    @yield('main-container')
</div>

@section('footer')
    @include('admin.includes.footer')
@show

</body>
</html>
