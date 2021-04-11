<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    {{--Toastr Notification cdn--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous"/>

    <link href="{{ asset('asset/backend/css/style.default.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/backend/css/select2.css')}}" rel="stylesheet"/>
    <link href="{{ asset('asset/backend/css/jquery.tagsinput.css')}}" rel="stylesheet"/>
    <link href="{{ asset('asset/backend/css/toggles.css')}}" rel="stylesheet"/>
    <link href="{{ asset('asset/backend/css/bootstrap-timepicker.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('asset/backend/css/style.datatables.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="//cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <link href="{{asset('asset/backend/css/custom.css')}}" rel="stylesheet">

</head>

<body>
<div id="loader" style="display: none"></div>

@if(isAdmin())
    @include('backend.include.header_admin')
@endif
@if(isUser())
    @include('backend.include.header_union')
@endif

<section>
    <div class="mainwrapper">
        @if(isAdmin())
            @include('backend.include.sidebar_admin')
        @endif
        @if(isUser())
            @include('backend.include.sidebar_union')
        @endif

        @yield('content')
    </div><!-- mainwrapper -->
</section>
@include('backend.include.footer')

{{--Toastr Notification script cdn--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>

<script type="text/javascript">
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>


</body>
</html>

