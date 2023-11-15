@extends('layout.main')

@section('title')
    Productmass
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <style>
        trix-toolbar [data-trix-button-group='file-tools']{
            display:none;
        }
    </style>
@endpush
@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')

    {{-- top navbar --}}



    {{-- main content --}}

    <div class="main-content">
        <div class="row">
            <div class="col-md-12 ">

                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-wrapper"
                        style="border-radius: 18px;background: #e0e0e0;box-shadow:  8px 8px 16px #bebebe,-8px -8px 16px #ffffff;">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6 align-items-start">
                                    <h2 class="ml-lg-2">Informasi Produk</h2>
                                </div>
                                <div class="col-sm-6 align-items-end">
                                <a href="{{ route('manajemen-produk.productmass.index') }}" class="btn btn-outline-light" style="border-radius: 10px;">
                                    <i class="material-icons">arrow_back_ios_new</i>
                                    <span>Back</span>
                                </a>
                            </div>
                            </div>

                        </div>
                        <div class="card p-4">
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <label for="name" class="form-label">Nama Produk</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Nama Produk">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="description" class="form-label">Example textarea</label>
                                    <input id="x" type="hidden" name="description">
                                    <trix-editor input="x" style="min-height: 80px;"></trix-editor>
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="brand" class="form-label">Brand</label>
                                    <select name="brand_id" id="brand" class="form-select"
                                        aria-label="Default select example">
                                        <option selected>Select Brand</option>
                                            <option value="">Brand1</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="category" class="form-label">Kategori Produk</label>
                                    <select id="category" name="product_category_id" class="form-select"
                                        aria-label="Default select example">
                                        <option selected>Select Kategori</option>
                                        <option >kategori</option>
                                        
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="preorder_category" class="form-label">Preorder Kategori</label>
                                    <select name="preorder_category_id" id="preorder_category" class="form-select"
                                        aria-label="Default select example">
                                        <option selected>Select Pre Order</option>
                                        <option >Pre Order</option>
                                        
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="size" class="form-label">Berat Produk</label>
                                    <input name="size" id="size" type="text" class="form-control" id="size"
                                        placeholder="Berat Produk">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-wrapper"
                        style="border-radius: 18px;background: #e0e0e0;box-shadow:  8px 8px 16px #bebebe,-8px -8px 16px #ffffff;">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6 align-items-start">
                                    <h2 class="ml-lg-2">Informasi Penjualan</h2>
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
                        <div class="card p-4">
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <img class="img-fluid rounded mx-auto d-block " id="img-preview" style="max-height: 200px;">
                                    <label for="image" class="form-label">Foto Produk</label>
                                    <input name="image" class="form-control" type="file" id="selectImage">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="col-sm-12 mb-3">
                                        <label for="sku_code" class="form-label">Kode SKU</label>
                                        <input name="sku_code" type="text" class="form-control" id="sku_code"
                                            placeholder="Kode SKU">
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="col-sm-12 mb-3">
                                        <label for="plu_code" class="form-label">Kode PLU</label>
                                        <input name="plu_code" type="text" class="form-control" id="plu_code"
                                            placeholder="Kode PLU">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="threshold" class="form-label">Threshold Pembelian per user per hari (0 jika
                                        menggunakan threshold global)</label>
                                    <input name="threshold" type="number" class="form-control" id="threshold"
                                        placeholder="Threshold" value="0">
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="status" class="form-label">Status Aktif</label>
                                    <select name="status" id="status" class="form-select"
                                        aria-label="Default select example">
                                        <option value="1">Ya</option>
                                        <option selected value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- main content --}}





    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}
@endsection

@push('js')
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script>
        document.addEventListener('trix-file-accept', function(e){
            e.preventDefault(); 
        });
        selectImage.onchange = evt => {
            preview = document.getElementById('img-preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
        
    </script>
@endpush
