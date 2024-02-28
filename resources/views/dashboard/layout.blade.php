@extends('components.layout')

@section('content')
    @include('dashboard.sidebar')
    @yield('dashboard-content')
@endsection
