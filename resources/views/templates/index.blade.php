@extends('templates.main')

@section('wrapper')
        @include('templates.partials.aside')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('templates.partials.d-header')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <div class="dark-transparent sidebartoggler"></div>
        <div class="dark-transparent sidebartoggler"></div>
@endsection