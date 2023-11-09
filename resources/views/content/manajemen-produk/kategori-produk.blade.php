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
    @livewire('kategori-produk')
    
@endsection

@push('js')
    @livewireScripts
@endpush
