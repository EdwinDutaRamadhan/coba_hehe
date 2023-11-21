@extends('layout.main')

@section('title')
    Kategori Produk
@endsection

@push('css')
    @livewireStyles
@endpush

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')



    {{-- top navbar --}}
    @livewire('manajemen-produk.kategori-produk.index')
    
@endsection

@push('js')
    @livewireScripts
@endpush
