@extends('layout.main')

@section('title')
    Stock
@endsection

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')

    {{-- top navbar --}}

    {{-- main content --}}

    {{-- main content --}}
    <div class="main-content">
        <div class="row">
            <div class="col-sm-6 ">
                <div class="table-wrapper"
                    style="border-radius: 18px;background: #e0e0e0;box-shadow:  8px 8px 16px #bebebe,-8px -8px 16px #ffffff;">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 align-items-start">
                                <h2 class="ml-lg-2"></h2>
                            </div>
                            <div class="col-sm-6 align-items-end">
                                {{-- <a href="#addModal" class="btn btn-success" -bs-toggle="modal"
                                        data-bs-target="#addModal">
                                        <i class="material-icons">&#xE147;</i>
                                        <span>Update Excel</span>
                                    </a> --}}
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <div class="row m-3">
                            <div class="col-sm-12">
                                <div class="d-flex justify-content-center">
                                    <p><i style="scale: 2.0;color:#1E56B1;" class="material-icons ">warehouse</i></p>
                                    <p class="mx-3"></p>
                                    <p class="fs-4 pt-1">{{ $data->total() }} Jenis Produk</p>
                                </div>
                            </div>
                            {{-- <div class="col-sm-6 text-end pt-3 pe-4"><i style="scale: 2.0;" class="material-icons ">warehouse</i></div>
                                <div class="col-sm-6 text ps-3 pt-2 fs-3">{{ $data->total() }} Jenis Produk</div> --}}
                        </div>
                    </table>


                </div>
            </div>
            <div class="col-sm-6 ">
                <div class="table-wrapper"
                    style="border-radius: 18px;background: #e0e0e0;box-shadow:  8px 8px 16px #bebebe,-8px -8px 16px #ffffff;">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 align-items-start">
                                <h2 class="ml-lg-2"></h2>
                            </div>
                            <div class="col-sm-6 align-items-end">
                                {{-- <a href="#addModal" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#addModal">
                                        <i class="material-icons">&#xE147;</i>
                                        <span>Update Excel</span>
                                    </a> --}}
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <div class="row m-3">
                            <div class="col-sm-12">
                                <div class="d-flex justify-content-center">
                                    <p><i style="scale: 2.0;color:#1E56B1;" class="material-icons ">store</i></p>
                                    <p class="mx-3"></p>
                                    <p class="fs-4 pt-1">Store {{ $store->name }} </p>
                                </div>
                            </div>
                        </div>
                    </table>


                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="xp-searchbar">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" wire:model.live="search">
                            <div class="input-group-append">
                                <button class="btn " style="height: 36px;" type="submit" id="button-addon2">Go
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @livewire('pengaturan-stok.toko.stock-barang', ['store_id' => $store_id])
    </div>
    {{-- main content --}}


    {{-- main content --}}

    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}
@endsection
