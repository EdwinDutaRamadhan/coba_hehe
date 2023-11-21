@extends('layout.main')

@section('title')
    Productmass
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">

    <style>
        trix-toolbar [data-trix-button-group='file-tools'] {
            display: none;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin: 2px;
            color: white !important;
            background-color: #1E56B1;
            border-radius: 4px;

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

                <form action="{{ route('manajemen-produk.productmass.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="table-wrapper"
                        style="border-radius: 18px;background: #e0e0e0;box-shadow:  8px 8px 16px #bebebe,-8px -8px 16px #ffffff;">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6 align-items-start">
                                    <h2 class="ml-lg-2">Informasi Produk</h2>
                                </div>
                                <div class="col-sm-6 align-items-end">
                                    <a href="{{ route('productmass.index') }}"
                                        class="btn btn-outline-light" style="border-radius: 10px;">
                                        <i class="material-icons">arrow_back_ios_new</i>
                                        <span>Back</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="card p-4">
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <label for="name" class="form-label @error('name') is-invalid @enderror">Nama
                                        Produk</label>
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Nama Produk">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 mb-3">
                                    {{-- <label for="editor" class="form-label">Example textarea</label> --}}
                                    {{-- <input id="x" type="hidden" name="description">
                                    <trix-editor input="x" style="min-height: 80px;"></trix-editor> --}}
                                    {{-- <textarea class="form-control ps-2 @error('description') is-invalid @enderror" id="editor" name="description"></textarea> --}}
                                    <input id="x" type="hidden" name="content">
                                    <trix-editor input="x"></trix-editor>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="brand" class="form-label">Brand</label>
                                    <input class="form-control @error('brand_id') is-invalid @enderror" type="text"
                                        id="brand" readonly data-bs-target="#brandLOV" data-bs-toggle="modal"
                                        placeholder="Cari brand...">
                                    <input type="hidden" name="brand_id" id="brand_value">
                                    @error('brand_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="category" class="form-label">Kategori</label>
                                    <input class="form-control @error('category_id') is-invalid @enderror" type="text"
                                        id="category" readonly data-bs-target="#categoryLOV" data-bs-toggle="modal"
                                        placeholder="Cari kategori...">
                                    <input type="hidden" name="category_id" id="category_value">
                                    @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="preorder_category" class="form-label">Preorder Kategori</label>
                                    <input class="form-control @error('preorder_category_id') is-invalid @enderror"
                                        type="text" id="preorder_category" readonly
                                        data-bs-target="#preorder_categoryLOV" data-bs-toggle="modal"
                                        placeholder="Cari kategori...">
                                    <input type="hidden" name="preorder_category_id" id="preorder_category_value">
                                    @error('preorder_category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="weight" class="form-label">Berat Produk</label>
                                    <input name="weight" id="weight" type="text"
                                        class="form-control @error('weight') is-invalid @enderror" id="weight"
                                        placeholder="Berat Produk">
                                    @error('weight')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="tags" class="form-label">Tags</label>
                                    <input type="text" name="tags" class="form-control ms-2" data-role="tagsinput"
                                        value="" id="tags" />
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
                                    <img class="img-fluid rounded mx-auto d-block " id="img-preview"
                                        style="max-height: 200px;">
                                    <label for="image" class="form-label">Foto Produk</label>
                                    <input name="image" class="form-control" type="file" id="selectImage">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="col-sm-12 mb-3">
                                        <label for="sku" class="form-label">Kode SKU</label>
                                        <input name="sku" type="text"
                                            class="form-control @error('sku') is-invalid @enderror" id="sku"
                                            placeholder="Kode SKU">
                                        @error('sku')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="col-sm-12 mb-3">
                                        <label for="plu" class="form-label">Kode PLU</label>
                                        <input name="plu" type="text"
                                            class="form-control @error('plu') is-invalid @enderror" id="plu"
                                            placeholder="Kode PLU">
                                        @error('plu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="threshold" class="form-label">Threshold Pembelian per user per hari (0
                                        jika
                                        menggunakan threshold global)</label>
                                    <input name="threshold" type="number"
                                        class="form-control @error('threshold') is-invalid @enderror" id="threshold"
                                        placeholder="Threshold" value="0">
                                    @error('threshold')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label for="status" class="form-label">Status Aktif</label>
                                    <select name="status" id="status"
                                        class="form-select @error('status') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option value="1">Ya</option>
                                        <option selected value="0">Tidak</option>
                                    </select>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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


    <!-- MODAL LOV BRAND-->
    <div class="modal fade" id="brandLOV" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="brandLOVLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-header">
                    {{-- <img src="{{ asset('img/logo.png') }}" alt="not found" srcset="" class="img-fluid"
                        style="max-width:196px;"> --}}
                    <h5 class="me-auto me-2 fw-bold">LOV Brand</h5>

                </div>
                <div class="modal-body">
                    @livewire('manajemen-produk.produkmass.lov-brand')
                </div>
                <div class="modal-footer" style="border-radius: 12px;">
                    <button type="button" class="btn btn-outline-danger" style="border-radius: 10px;"
                        id="brandLOV_reset" data-bs-dismiss="modal">Reset</button>
                    <button type="button" class="btn btn-outline-danger" style="border-radius: 10px;"
                        id="brandLOV_close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL LOV CATEGORY-->
    <div class="modal fade" id="categoryLOV" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="categoryLOVLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-header">
                    {{-- <img src="{{ asset('img/logo.png') }}" alt="not found" srcset="" class="img-fluid"
                style="max-width:196px;"> --}}
                    <h5 class="me-auto me-2 fw-bold">LOV Category</h5>

                </div>
                <div class="modal-body">
                    @livewire('manajemen-produk.produkmass.lov-category')
                </div>
                <div class="modal-footer" style="border-radius: 12px;">
                    <button type="button" class="btn btn-outline-danger" style="border-radius: 10px;"
                        id="categoryLOV_reset" data-bs-dismiss="modal">Reset</button>
                    <button type="button" class="btn btn-outline-danger" style="border-radius: 10px;"
                        id="categoryLOV_close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL PREORDER CATEGORY LOV --}}
    <div class="modal fade" id="preorder_categoryLOV" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="preorder_categoryLOVLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-header">
                    {{-- <img src="{{ asset('img/logo.png') }}" alt="not found" srcset="" class="img-fluid"
                style="max-width:196px;"> --}}
                    <h5 class="me-auto me-2 fw-bold">LOV Preorder Category</h5>

                </div>
                <div class="modal-body">
                    @livewire('manajemen-produk.produkmass.lov-preorder-category')
                </div>
                <div class="modal-footer" style="border-radius: 12px;">
                    <button type="button" class="btn btn-outline-danger" style="border-radius: 10px;"
                        id="preorder_categoryLOV_reset" data-bs-dismiss="modal">Reset</button>
                    <button type="button" class="btn btn-outline-danger" style="border-radius: 10px;"
                        id="preorder_categoryLOV_close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}
@endsection

@push('js')
    {{-- <script src="tinymce/tinymce.min.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script> --}}
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <script>
        tinymce.init({
            selector: '#myTextarea'
        });
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
        // ClassicEditor
        //     .create(document.querySelector('#editor'))
        //     .catch(error => {
        //         console.error(error);
        //     });

        selectImage.onchange = evt => {
            preview = document.getElementById('img-preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
    <script>
        $(function() {
            $('input')
                .on('change', function(event) {
                    var $element = $(event.target);
                    var $container = $element.closest('.example');

                    if (!$element.data('tagsinput')) return;

                    var val = $element.val();
                    if (val === null) val = 'null';
                    var items = $element.tagsinput('items');

                    $('code', $('pre.val', $container)).html(
                        $.isArray(val) ?
                        JSON.stringify(val) :
                        '"' + val.replace('"', '\\"') + '"'
                    );
                    $('code', $('pre.items', $container)).html(
                        JSON.stringify($element.tagsinput('items'))
                    );
                })
                .trigger('change');
        });
    </script>
@endpush
