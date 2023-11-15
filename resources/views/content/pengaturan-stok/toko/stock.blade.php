@extends('layout.main')

@section('title')
    Stock
@endsection

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')

    {{-- top navbar --}}

    {{-- main content --}}
    @livewire('pengaturan-stok.toko.stock-barang',['store_id' => $store_id])
    
    {{-- main content --}}

    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}
@endsection
