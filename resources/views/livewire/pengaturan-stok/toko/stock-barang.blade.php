<div class="row">
    <div class="col-md-12 ">
        <div class="table-wrapper"
            style="border-radius: 18px;background: #e0e0e0;box-shadow:  8px 8px 16px #bebebe,-8px -8px 16px #ffffff;">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6 align-items-start">
                        <h2 class="ml-lg-2">Stock Barang</h2>
                    </div>
                    <div class="col-sm-6 align-items-end">
                        <a href="#addModal" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="material-icons">&#xE147;</i>
                            <span>Update Excel</span>
                        </a>
                        {{-- <a href="{{ route('pengaturan-stok.toko.index') }}" class="btn btn-outline-light" --}}
                        <a href="{{ route('pengaturan-stok.toko.index') }}" class="btn btn-outline-light"
                                        style="border-radius: 10px;">
                                        <i class="material-icons">arrow_back_ios_new</i>
                                        <span>Back</span>
                                    </a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class="w-auto">Produk</th>
                        <th style="width: 120px;">PLU</th>
                        <th style="width: 120px;">SKU</th>
                        <th style="width: 120px;">Harga</th>
                        <th style="width: 120px;">Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data->count())
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->product->name }}</td>
                                <td>{{ $d->product->plu }}</td>
                                <td>{{ $d->product->sku }}</td>
                                <td>{{ $d->price }}</td>
                                <td>{{ $d->current_stock }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center fw-bold">No Data Found</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div class="row m-3">
                <div class="col-sm-12 ">
                    {{ $data->links() }}
                </div>
            </div>

        </div>
    </div>
</div>
