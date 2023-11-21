@extends('layout.main')

@section('title')
    Toko | Edit
@endsection

@push('css')
    @livewireStyles
@endpush
@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')

    {{-- top navbar --}}



    {{-- main content --}}

    <div class="main-content">
        <div class="row">
            <div class="col-md-12 ">

                <form action="{{ route('pengaturan-stok.toko.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="update_token" value="{{ Crypt::encryptString($data->store_id) }}">
                    <div class="table-wrapper"
                        style="border-radius: 18px;background: #e0e0e0;box-shadow:  8px 8px 16px #bebebe,-8px -8px 16px #ffffff;">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-6 align-items-start">
                                    <h2 class="ml-lg-2">Informasi Toko</h2>
                                </div>
                                <div class="col-sm-6 align-items-end">
                                    <a href="{{ route('store.index') }}" class="btn btn-outline-light"
                                        style="border-radius: 10px;">
                                        <i class="material-icons">arrow_back_ios_new</i>
                                        <span>Back</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="card p-4">
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="name" class="form-label">Nama Toko</label>
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        placeholder="Nama Toko" value="{{ old('name') ?? $data->name }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="store_code" class="form-label">Kode Toko</label>
                                    <input name="store_code" type="text"
                                        class="form-control @error('store_code') is-invalid @enderror" id="store_code"
                                        placeholder="Ex : AK47" value="{{ old('store_code') ?? $data->store_code }}">
                                    @error('store_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label for="branch_code" class="form-label">Kode Cabang</label>
                                    <input name="branch_code" type="text"
                                        class="form-control @error('branch_code') is-invalid @enderror" id="branch_code"
                                        placeholder="Ex : MP5" value="{{ old('branch_code') ?? $data->branch_code }}">
                                    @error('branch_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- @livewire('pengaturan-stok.toko.location-list-add') --}}
                                <div class="col-sm-6 mb-3">
                                    <label for="location" class="form-label">Lokasi Toko</label>
                                    <input type="text" id="location" class="form-control @error('location') is-invalid @enderror"
                                        placeholder="Search" data-bs-toggle="modal" data-bs-target="#locationLOV" readonly value="{{ isset($data->location) ?  $data->location->kelurahan.' '.$data->location->kecamatan.' '.$data->location->kabupaten.' '.$data->location->provinsi.' '.$data->location->kodepos : '' }}">
                                    <input type="hidden" name="location" id="location_value" value="{{ $data->location->location_id ?? '' }}">
                                </div>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="col-sm-6 mb-3">
                                    <label for="plastic_product" class="form-label">Produk Kantong Plastik</label>
                                    <input type="text" id="plastic_product" class="form-control @error('plastic_product') is-invalid @enderror"
                                        placeholder="Search" data-bs-toggle="modal" data-bs-target="#plastic_productLOV" readonly value="{{ $data->plastic_product->name ?? '' }}">
                                    <input type="hidden" name="plastic_product" id="plastic_product_value" value="{{ $data->plastic_product->product_id ?? '' }}">
                                </div>
                                @error('plastic_product')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="col-sm-6 mb-3">
                                    <label for="address" class="form-label">Alamat Toko</label>
                                    <input name="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" id="address"
                                        placeholder="Alamat" value="{{ old('address') ?? $data->address }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="phone_number" class="form-label">Nomor Telepon</label>
                                    <input name="phone_number" type="text"
                                        class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                                        placeholder="Nomor Telepon" value="{{ old('phone_number') ?? $data->phone_number }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="enable_deficit" class="form-label">Bisa Menerima Pesanan Defisit</label>
                                    <select name="enable_deficit" id="enable_deficit" class="form-select"
                                        aria-label="Default select example">
                                        <option value="1">Ya</option>
                                        <option selected value="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="lat" class="form-label">Plant Latitude</label>
                                    <input name="lat" type="text" class="form-control" id="lat"
                                        placeholder="0.0" value="{{ $data->lat ?? '0.0' }}">
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="lng" class="form-label">Plant Longitude</label>
                                    <input name="lng" type="text" class="form-control" id="lng"
                                        placeholder="0.0" value="{{ $data->lng ?? '0.0' }}">
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" onclick="eksekusi();" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    {{-- main content --}}



    <!-- MODAL LOV LOCATION-->
    <div class="modal fade" id="locationLOV" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="locationLOVLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-header">

                    <img src="{{ asset('img/logo.png') }}" alt="not found" srcset="" class="img-fluid"
                        style="max-width:196px;">

                    <h5 class="ms-auto me-2 fw-bold">Lokasi Toko</h5>

                </div>
                <div class="modal-body">
                    @livewire('pengaturan-stok.toko.lov-location')
                </div>
                <div class="modal-footer" style="border-radius: 12px;">
                    <button type="button" class="btn btn-outline-danger" style="border-radius: 10px;"
                        id="lovationLOV_close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL LOV PLASTIC PRODUCT -->
    <div class="modal fade" id="plastic_productLOV" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="plastic_productLOVLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-header">

                    <img src="{{ asset('img/logo.png') }}" alt="not found" srcset="" class="img-fluid"
                        style="max-width:196px;">

                    <h5 class="ms-auto me-2 fw-bold">Produk Kantong Plastik</h5>

                </div>
                <div class="modal-body">
                    @livewire('pengaturan-stok.toko.lov-product-kantong-plastik')
                </div>
                <div class="modal-footer" style="border-radius: 12px;">
                    <button type="button" class="btn btn-outline-danger" style="border-radius: 10px;"
                        id="plastic_productLOV_close" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}
@endsection

@push('js')
    <script>
        document.addEventListener('trix-file-accept', function(e) {
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
    @livewireScripts
@endpush
