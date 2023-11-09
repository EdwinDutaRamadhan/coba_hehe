@extends('layout.main')

@section('title')
    Kategori Preorder
@endsection

@push('css')
    @livewireStyles
@endpush

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')



    {{-- top navbar --}}
    @livewire('kategori-preorder')

    
@endsection

@push('js')
    @livewireScripts
@endpush
