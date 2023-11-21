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
                                    <option>All</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search"
                                    wire:model.live="search">
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
            <div class="col-md-12 ">
                <div class="table-wrapper"
                    style="border-radius: 18px;background: #e0e0e0;box-shadow:  8px 8px 16px #bebebe,-8px -8px 16px #ffffff;">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 align-items-start">
                                <h2 class="ml-lg-2">Kategori Preorder</h2>
                            </div>
                            <div class="col-sm-6 align-items-end">
                                <a href="#addModal" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Preorder</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: auto;">Name</th>
                                <th style="width: 100px;" class="text-center">Status</th>
                                <th style="width: 85px;"class="text-center">Min Est</th>
                                <th style="width: 85px;"class="text-center">Max Est</th>
                                <th style="width: 150px;" class="text-center">Start</th>
                                <th style="width: 150px;" class="text-center">End</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">LP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count())
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->name }}</td>
                                        @if ($d->iud_status == 'i')
                                            <td><button style="border-radius: 12px;"
                                                    onclick="confirmStatus({{ $loop->index }},'menonaktifkan');"
                                                    class="btn btn-sm w-100 btn-success">Active</button></td>
                                        @else
                                            <td><button style="border-radius: 12px;"
                                                    onclick="confirmStatus({{ $loop->index }},'mengaktifkan');"
                                                    class="btn btn-sm w-100 btn-danger">Inactive</button></td>
                                        @endif
                                        <td class="text-center">{{ $d->min_day_est }} hari</td>
                                        <td class="text-center">{{ $d->max_day_est }} hari</td>
                                        <td class="text-center">{{ $d->start_time }}</td>
                                        <td class="text-center">{{ $d->end_time }}</td>
                                        <td class="text-center" style="width: 20px;"><i class="material-icons"
                                                data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#editModal"
                                                onclick="update({{ $loop->index }})" role="button">edit</i></td>
                                        <td class="text-center">{{ $d->updated_at->diffForHumans() }}</td>
                                        {{-- <td class="text-center" style="width: 20px;"><i class="material-icons"
                                                onclick="remove({{ $loop->index }});" role="button">delete</i></td> --}}
                                        <form action="{{ route('manajemen-produk.kategori-preorder.destroy') }}"
                                            method="post" style="display:none;" id="form_remove_{{ $loop->index }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="delete_token"
                                                value="{{ Crypt::encryptString($d->preorder_category_id) }}">
                                            <input type="hidden" name="name" value="{{ $d->name }}">
                                            <input type="hidden" name="status" value="{{ $d->iud_status }}">
                                        </form>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center fw-bold">No Data Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <table class="table table-striped">
                        {{ $data->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- main content --}}
</div>

@push('js')
    <script>
        const obj = {{ Js::from($data) }};
    </script>
@endpush
