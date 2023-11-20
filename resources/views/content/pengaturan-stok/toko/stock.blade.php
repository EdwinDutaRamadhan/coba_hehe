@extends('layout.main')

@section('title')
    Stock
@endsection

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')

    {{-- top navbar --}}

    {{-- main content --}}

    @livewire('pengaturan-stok.toko.stock-barang', ['store_id' => $store_id])


    {{-- main content --}}

    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}

    <!-- Modal Add-->
    <form action="{{ route('pengaturan-stok.toko.stock.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal fade" id="importExcel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="importExcelLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content" style="border-radius: 12px;">
                    <div class="modal-header">
                        <img src="{{ asset('img/logo.png') }}" alt="not found" srcset="" class="img-fluid w-50"
                            style="max-width:196px;">
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                    </div>
                    <div class="modal-body">
                        <h4 class="modal-title mb-4">Update Stock</h4>
                        <div class="form-group">
                            <label>Import Excel</label>
                            <input type="hidden" name="store" value="{{ $store_id }}">
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-radius: 10px;background-color: #E11D37;">
                        <button class="btn btn-outline-light" style="border-radius: 10px;" type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="submit" onclick="eksekusi();" class="btn btn-outline-light"
                            style="border-radius: 10px;">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
