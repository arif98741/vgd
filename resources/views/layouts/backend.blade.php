<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <link href="{{ asset('asset/backend/css/style.default.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/backend/css/select2.css')}}" rel="stylesheet" />
    <link href="{{ asset('asset/backend/css/jquery.tagsinput.css')}}" rel="stylesheet" />
    <link href="{{ asset('asset/backend/css/toggles.css')}}" rel="stylesheet" />
    <link href="{{ asset('asset/backend/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('asset/backend/css/select2.css')}}" rel="stylesheet" />

</head>

<body>

@include('backend.include.header')

<section>
    <div class="mainwrapper">
        @include('backend.include.sidebar')
        @yield('content')
    </div><!-- mainwrapper -->
</section>
@include('backend.include.footer')

</body>
</html>

