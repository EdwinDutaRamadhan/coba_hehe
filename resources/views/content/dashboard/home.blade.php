@extends('layout.main')

@section('title')
    Dashboard
@endsection

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')

    {{-- top navbar --}}

    {{-- main content --}}

    <div class="main-content">
        <div class="row">
            <div class="col-md-12 ">
                <div class="table-wrapper"
                    style="border-radius: 18px;background: #e0e0e0;box-shadow:  8px 8px 16px #bebebe,-8px -8px 16px #ffffff;">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 align-items-start">
                                <h2 class="ml-lg-2">Dashboard</h2>
                            </div>
                            {{-- <div class="col-sm-6 align-items-end">
                                <a href="#addModal" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Produk</span>
                                </a>
                            </div> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- main content --}}





    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}
@endsection
