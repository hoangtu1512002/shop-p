@extends('admin.layout.base')

@section('main')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <aside class="left-sidebar">
            @include('admin.layout.sidebar')
        </aside>

        <div class="body-wrapper">
            @include('admin.layout.header')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
