@extends('layout.main')

@section('title')
    Brand
@endsection

@push('css')
    @livewireStyles
@endpush

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')

    {{-- top navbar --}}


    @livewire('manajemen-produk.brand.index')
    
@endsection

@push('js')
    @livewireScripts
@endpush
