<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Modernize</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <style>
        @yield('styles');
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        @yield('main')
        @include('common.success')
        @include('common.error')
        @include('common.delete-modal-confirm')
        @include('common.loader')
    </div>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}?v=js_sidebar"></script>
    <script src="{{ asset('js/select2.js') }}"></script>
    <script src="{{ asset('js/inputmask.js') }}"></script>
    <script src="{{ asset('js/modals.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.loader-container').addClass('show');

            $('.select2').select2();

            @yield('scripts');
        });

        $('form').on('submit', function(e) {
            $('.loader-container').addClass('show');
        });

        $(window).on('load', function() {
            $('.loader-container').removeClass('show');
        });
    </script>
</body>

</html>
