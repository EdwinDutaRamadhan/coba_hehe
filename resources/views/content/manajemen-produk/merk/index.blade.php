@extends('layout.main')

@section('title')
    Merk
@endsection

@push('css')
    @livewireStyles
@endpush

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')

    {{-- top navbar --}}


    @livewire('manajemen-produk.merk.index')
    
@endsection

@push('js')
    @livewireScripts
@endpush
