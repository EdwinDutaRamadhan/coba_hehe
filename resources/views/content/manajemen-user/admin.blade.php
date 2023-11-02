@extends('layout.main')

@section('title')
    <title>Dashboard</title>
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
                                <h2 class="ml-lg-2">Admin</h2>
                            </div>
                            <div class="col-sm-6 align-items-end">
                                <a href="#addModal" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Admin</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- main content --}}


    <!-- Modal Add-->
    <form action="" method="post">
        @csrf
        <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="addModalLabel" aria-hidden="true">
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
                        <h4 class="modal-title mb-4">Buat Admin</h4>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-radius: 10px;background-color: #E11D37;">
                        <button class="btn btn-outline-light" style="border-radius: 10px;" type="button"
                            class="btn-close" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="submit" onclick="eksekusi();" class="btn btn-outline-light"
                            style="border-radius: 10px;">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}
@endsection
