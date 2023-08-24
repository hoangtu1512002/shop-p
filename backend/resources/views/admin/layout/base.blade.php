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
    @yield('styles');
</head>

<body>
    @yield('main')
    @include('common.effect.success')
    @include('common.effect.error')
    @include('common.template.delete-modal-confirm')
    @include('common.effect.loader')
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

            $('.select2').select2({
                placeholder: 'vui lòng chọn'
            });
        });

        $('form').on('submit', function(e) {
            $('.loader-container').addClass('show');
        });

        $(window).on('load', function() {
            $('.loader-container').removeClass('show');
        });
    </script>
    @yield('scripts');
</body>

</html>
