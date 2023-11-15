    {{-- main content --}}
    <div class="main-content">
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
                                <a href="#addModal" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Update Excel</span>
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
                            @if ($data->stock->count())
                                @foreach ($data->stock as $d)
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
                                        <td colspan="3" class="text-center fw-bold">No Data Found</td>
                                    </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                    </div>
                    {{-- <table class="table table-striped table-hover">
                        {{ $data->links() }}
                    </table> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- main content --}}
