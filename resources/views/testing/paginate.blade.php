@extends('layout.main')


@push('css')
    {{-- @livewireStyles --}}
   
@endpush

@section('content')
    @livewire('product')
@endsection

@push('js')
    {{-- @livewireScripts --}}
@endpush
