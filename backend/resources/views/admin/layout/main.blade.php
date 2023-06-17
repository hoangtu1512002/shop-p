@extends('admin.layout.base')

@section('main')
    <aside class="left-sidebar">
        @include('admin.layout.sidebar')
    </aside>

    <div class="body-wrapper">
        @include('admin.layout.header')
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
@endsection
