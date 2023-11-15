<div>
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

                    {{-- Table Head --}}
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 align-items-start">
                                <h2 class="ml-lg-2">Toko</h2>
                            </div>
                            <div class="col-sm-6 align-items-end">
                                <a href="{{ route('pengaturan-stok.toko.tambah') }}" class="btn btn-success">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Toko</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- Table Body --}}
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: auto;">Name</th>
                                <th style="width: 40px;">Stock</th>
                                <th style="width: 100px;">Status</th>
                                <th style="width: 120px;">Kode Toko</th>
                                <th style="width: 120px;">Kode Branch</th>
                                <th style="width: 180px;">Nomor Telepon</th>
                                {{-- <th class="w-25">Terakhir Diperbaharui</th> --}}
                                <th style="width: 40px;" class="text-center">Edit</th>
                                {{-- <th style="min-width: 164px;">Created_at</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    @if ($d->iud_status == 'i')
                                        <td class="text-center text-success"><a href="{{ route('pengaturan-stok.toko.stock',$d->store_id) }}">
                                                <i class="material-icons" role="button">warehouse</i></a>
                                        </td>
                                        <td><button style="border-radius: 12px;"
                                                onclick="confirmStatus({{ $loop->index }},'menonaktifkan');"
                                                class="btn btn-sm w-100 btn-success">Active</button></td>
                                    @else
                                        <td class="text-center text-danger"><a href="{{ route('pengaturan-stok.toko.stock',$d->store_id) }}">
                                                <i class="material-icons" role="button">warehouse</i></a>
                                        </td>
                                        <td><button style="border-radius: 12px;"
                                                onclick="confirmStatus({{ $loop->index }},'mengaktifkan');"
                                                class="btn btn-sm w-100 btn-danger">Inactive</button></td>
                                    @endif
                                    <td>{{ $d->store_code }}</td>
                                    <td>{{ $d->branch_code }}</td>
                                    <td>{{ $d->phone_number }}</td>
                                    {{-- <td>{{ $d->updated_at->diffForHumans() }}</td> --}}
                                    <td><a
                                            href="{{ route('pengaturan-stok.toko.edit', Crypt::encryptString($d->store_id)) }}"><i
                                                class="material-icons" role="button">edit</i></a></td>
                                    {{-- <td><a href="{{ route('panel.remove') }}"><i class="material-icons" data-confirm-delete="true">delete</i></a></td> --}}
                                    {{-- <td>{{ $d->created_at }}</td> --}}
                                    <form action="{{ route('pengaturan-stok.toko.destroy') }}" method="post"
                                        style="display:none;" id="form_remove_{{ $loop->index }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="delete_token"
                                            value="{{ Crypt::encryptString($d->store_id) }}">
                                        <input type="hidden" name="name" value="{{ $d->name }}">
                                        <input type="hidden" name="status" value="{{ $d->iud_status }}">
                                    </form>
                                </tr>
                            @endforeach

                            <!----edit-modal end--------->
                        </tbody>


                    </table>
                    <div class="row m-3">
                        <div class="col-sm-2">
                            Total Store : {{ $data->total() }}
                        </div>
                        <div class="col-sm-10">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        function confirmStatus() {
            const form = $('#form_remove_' + arguments[0]);
            // var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Apakah anda yakin ingin ${arguments[1]} data ini?`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        event.preventDefault();
                        form.submit();
                        eksekusi();
                    }
                });
        }
    </script>
@endpush
