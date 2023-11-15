@extends('layout.main')

@section('title')
    Toko
@endsection

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')

    {{-- top navbar --}}

    {{-- main content --}}

    @livewire('store-table')
    
    {{-- main content --}}





    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}
@endsection
