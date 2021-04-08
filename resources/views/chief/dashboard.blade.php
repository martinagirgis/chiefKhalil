@if( LaravelLocalization::getCurrentLocaleName() == "English")
<html>
<head>
    <title>Chief Khalil</title>
</head>
@section('header')
    @include('chief.includes.header')
@show
<body>

<div class="pre-loader">
    @include('chief.includes.structure.pre_loader')
</div>

<div class="header">
    @include('chief.includes.structure.header')
</div>
<div class="right-sidebar">
    @include('chief.includes.structure.settings')
</div>

<div class="left-side-bar">
    @include('chief.includes.structure.main')
</div>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    @yield('main-container')
</div>

@section('footer')
    @include('chief.includes.footer')
@show

</body>
</html>
@else
<html style="text-align:right;direction:rtl">
<head>
    <title>الشيف خليل</title>
</head>

@section('header')
    @include('chief.includes.header')
@show
<style>
    .left-side-bar, .left-side-bar:before{
        position: fixed;
        right: 0;
        top: 0;
    }
    .header {
        right: unset;
        left: 0;
    }

    .right-sidebar {
        position: fixed;
        left: 0;
    }
    .right-sidebar-visible {
        right: unset;
        left: 0;
    }

</style>
<body>

<div class="pre-loader">
    @include('chief.includes.structure.pre_loader')
</div>

<div class="header">
    @include('chief.includes.structure.header')
</div>
<div class="right-sidebar" >
    @include('chief.includes.structure.settings')
</div>

<div class="right-side-bar">
    @include('chief.includes.structure.main')
</div>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    @yield('main-container')
</div>

@section('footer')
    @include('chief.includes.footer')
@show

</body>
@endif
