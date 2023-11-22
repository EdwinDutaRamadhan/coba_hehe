<div>
    <div class="main-content">
        <div class="row mb-3">
            <div class="col-sm-12">
                <div class="xp-searchbar">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" wire:model.live="tasearch">
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

                    {{-- Table Head --}}
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
                    {{-- Table Body --}}
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="w-25">Name</th>
                                <th class="w-25">Email</th>
                                <th class="w-25">Role</th>
                                <th class="w-25">Status</th>
                                {{-- <th class="w-25">Terakhir Diperbaharui</th> --}}
                                <th colspan="2" class="text-center">Action</th>
                                {{-- <th style="min-width: 164px;">Created_at</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    @if (isset($d->role->name))
                                        <td>{{ $d->role->name }}</td>
                                    @else
                                        <td>Tidak Ada Role</td>
                                    @endif
                                    @if ($d->iud_status === 'i')
                                        <td>Active</td>
                                    @else
                                        <td>Inactive</td>
                                    @endif
                                    {{-- <td>{{ $d->updated_at->diffForHumans() }}</td> --}}
                                    <td>
                                        <i class="material-icons" data-toggle="tooltip" data-bs-toggle="modal"
                                            data-bs-target="#editModal" onclick="update({{ $loop->index }})"
                                            role="button">edit</i>
                                    </td>
                                    <td><i class="material-icons" onclick="remove({{ $loop->index }});"
                                            role="button">delete</i></td>
                                    {{-- <td><a href="{{ route('panel.remove') }}"><i class="material-icons" data-confirm-delete="true">delete</i></a></td> --}}
                                    {{-- <td>{{ $d->created_at }}</td> --}}
                                    <form action="{{ route('manajemen-user.admin.destroy') }}" method="POST"
                                        style="display:none;" id="form_remove_{{ $loop->index }}">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="delete_token"
                                            value="{{ Crypt::encryptString($d->admin_id) }}">
                                        <input type="hidden" name="name" value="{{ $d->name }}">
                                    </form>
                                </tr>
                            @endforeach

                            <!----edit-modal end--------->
                        </tbody>


                    </table>
                    <table class="table table-striped">

                        {{ $data->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>