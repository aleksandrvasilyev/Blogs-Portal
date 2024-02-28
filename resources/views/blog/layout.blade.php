@extends('components.layout')

@section('content')
    @include('components.sidebar')
    @yield('blog-content')
@endsection
