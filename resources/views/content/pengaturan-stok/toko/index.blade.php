@extends('layout.main')

@section('title')
    Toko
@endsection

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')

    {{-- top navbar --}}

    {{-- main content --}}

    @livewire('pengaturan-stok.toko.index')
    
    {{-- main content --}}





    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}
@endsection
