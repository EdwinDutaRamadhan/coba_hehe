<div>
    {{-- main content --}}

    <div class="main-content">
        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="xp-searchbar">
                    <form class="row">
                        <div class="col-sm-2">
                            <div class="input-group">
                                <select class="form-control" id="status" wire:model.live="status">
                                    <option>Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <select class="form-control" id="paginate" wire:model.live="paginate">
                                    <option value="10">Page : 10</option>
                                    <option value="20">Page : 20</option>
                                    <option value="30">Page : 30</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" wire:model.live="search">
                                <div class="input-group-append">
                                    <button class="btn " style="height: 36px;" type="submit" id="button-addon2">Go
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrapper mb-0 my-0"
                    style="border-radius: 18px;background: #e0e0e0;box-shadow:  8px 8px 16px #bebebe,-8px -8px 16px #ffffff;">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 align-items-start">
                                <h2 class="ml-lg-2">Manajemen Produk</h2>
                            </div>
                            <div class="col-sm-6 align-items-end">
                                    <a href="" class="btn btn-success">
                                        <i class="material-icons">&#xE147;</i>
                                        <span>Produk</span>
                                    </a>
                            </div>
                        </div>
                    </div>
                    {{-- background-color:#F3F5F7; --}}


                </div>

                @foreach ($data as $d)
                    <div class="card my-2 mx-0" style="border-radius: 18px;">
                        <div class="row g-0">
                            <div class="col-sm-2">
                                <img src="{{ $d->avatar != '' ? $d->avatar : asset('img/img_not_found.png')  }}" class="img-fluid rounded mx-auto d-block p-2"
                                    style="max-height: 128px;" onerror="this.src='{{ asset('img/img_not_found.png') }}';">
                            </div>
                            <div class="col-sm-5">
                                <div class="card-body mx-3">
                                    <h6 class="card-title text-center fw-bold py-0">{{ $d->name }}</h6>
                                    <div class="d-flex justify-content-start ">
                                        <p class="card-text text-muted mt-0">Category </p>
                                        <p class="card-text px-2 mt-0">:</p>
                                        <p class="card-text mt-0">{{ $d->category->name }}</p>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <p class="card-text text-muted text-secondary">SKU Code </p>
                                        <p class="card-text px-2">:</p>
                                        <p class="card-text">{{ $d->sku }}</p>
                                    </div>

                                    {{-- <p class="card-text">Brand &emsp;&emsp;&ensp;&nbsp;: &emsp;{{ $d->brand->name }}. --}}
                                    {{-- </p> --}}
                                    {{-- <p class="card-text">SKU Code &emsp;: &emsp;{{ $d->sku_code }}</p> --}}
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="card-body">
                                    <div class="d-flex bd-highlight mb-3">
                                        <div class="me-auto p-2 bd-highlight">
                                            @if ($d->iud_status == 'i')
                                                <button class="d-flex align-items-center btn btn-sm btn-success">
                                                    <i class="material-icons mt-0" style="scale: 0.9;">done</i>
                                                    <p class="mt-0">Active</p>
                                                </button>
                                            @else
                                                <button class="d-flex align-items-center btn btn-sm btn-danger">
                                                    <i class="material-icons mt-0" style="scale: 0.9;">close</i>
                                                    <p class="mt-0">Active</p>
                                                </button>
                                            @endif
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            <a href="" type="button"
                                                class="btn btn-sm btn-warning h-100">Update</a>
                                        </div>
                                        <div class="p-2 bd-highlight">
                                            @if ($d->iud_status == 'i')
                                                <button onclick="confirmStatus({{ $loop->index }}, 'menonaktifkan');"
                                                    type="button" class="btn btn-sm btn-info h-100">Enable</button>
                                            @else
                                                <button onclick="confirmStatus({{ $loop->index }}, 'mengaktifkan');"
                                                    type="button" class="btn btn-sm btn-danger h-100">Disable</button>
                                            @endif
                                        </div>
                                        {{-- <form action="{{ route('manajemen-produk.produk-updatestatus', $d->product_id) }}"
                                        method="get" id="form_confirm_{{ $d->product_id }}">
                                    </form> --}}
                                    <form action="{{ route('manajemen-produk.productmass.destroy') }}" method="post"
                                        style="display:none;" id="form_remove_{{ $loop->index }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="delete_token"
                                            value="{{ Crypt::encryptString($d->product_id) }}">
                                        <input type="hidden" name="name" value="{{ $d->name }}">
                                        <input type="hidden" name="status" value="{{ $d->iud_status }}">
                                    </form>
                                    </div>
                                    <p class="card-text"><small
                                            class="text-body-secondary position-absolute bottom-0 end-0 pb-2 pe-3">Last
                                            updated {{ $d->updated_at->diffForHumans() }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <p class="ps-3 fw-bold">Total : {{ $data->total() }}</p>
            </div>
            <div class="col-sm-10">
                {{ $data->links() }}
            </div>
        </div>
    </div>
    {{-- main content --}}
</div>
