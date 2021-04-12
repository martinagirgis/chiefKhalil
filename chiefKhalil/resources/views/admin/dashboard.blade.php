@if( LaravelLocalization::getCurrentLocaleName() == "English")
<html>
<head>
    <title>Chief Khalil</title>
</head>
@section('header')
    @include('admin.includes.header')
@show
<body>

<div class="pre-loader">
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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @yield('main-container')
</div>

@section('footer')
    @include('admin.includes.footer')
@show

</body>
</html>
@else
<html style="text-align:right;direction:rtl">
<head>
    <title>الشيف خليل</title>
</head>

@section('header')
    @include('admin.includes.header')
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
    .main-container {
        padding : 0;
        padding-right: 300px;

    }
</style>
<body>

<div class="pre-loader">
    @include('admin.includes.structure.pre_loader')
</div>

<div class="header">
    @include('admin.includes.structure.header')
</div>
<div class="right-sidebar" >
    @include('admin.includes.structure.settings')
</div>

<div class="right-side-bar">
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
@endif
