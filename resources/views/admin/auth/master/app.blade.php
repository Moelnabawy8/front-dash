<!doctype html>
<html lang="en">
@include('admin.auth.partials.head')
<div class="d-flex align-items-center gap-3">
    <div>
        @include('admin.partials.language')
    </div>
    <div>
        @include('admin.partials.colormode')
    </div>
</div>

<body class="light {{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'rtl' : '' }} ">
    @yield('content')


</body>

@include('admin.auth.partials.scripts')


</html>
