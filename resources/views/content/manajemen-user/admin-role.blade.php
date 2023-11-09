@extends('layout.main')

@section('title')
    Admin Role
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
                                <h2 class="ml-lg-2">Admin Role</h2>
                            </div>
                            <div class="col-sm-6 align-items-end">
                                <a href="#addModal" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    <i class="material-icons">&#xE147;</i>
                                    <span>Role</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="w-75">Name</th>
                                <th class="w-25">Terakhir Diperbaharui</th>
                                <th colspan="2" class="text-center">Action</th>
                                {{-- <th style="min-width: 164px;">Created_at</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <i class="material-icons" data-toggle="tooltip" data-bs-toggle="modal"
                                            data-bs-target="#editModal" onclick="update({{ $loop->index }})" role="button">edit</i>
                                    </td>
                                    <td><i class="material-icons" onclick="remove({{ $loop->index }});"
                                            role="button">delete</i></td>
                                    {{-- <td><a href="{{ route('panel.remove') }}"><i class="material-icons" data-confirm-delete="true">delete</i></a></td> --}}
                                    {{-- <td>{{ $d->created_at }}</td> --}}
                                    <form action="{{ route('manajemen-user.admin-role.destroy') }}" method="post"
                                        style="display:none;" id="form_remove_{{ $loop->index }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="delete_token"
                                            value="{{ Crypt::encryptString($d->role_id) }}">
                                        <input type="hidden" name="name" value="{{ $d->name }}">
                                    </form>

                                </tr>
                            @endforeach

                            <!----edit-modal end--------->
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- main content --}}

    <!-- Modal Add-->
    <form action="{{ route('manajemen-user.admin-role.store') }}" method="post">
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
                        <h4 class="modal-title mb-4">Tambah Role</h4>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <label for="">Akses</label>
                        <div class="row">
                            <div class="col-sm-6">{{-- Dashboard --}}
                                <div class="form-check ">
                                    <input class="form-check-input" onclick="parent('dashboard');"
                                        type="checkbox" id="parent-dashboard" checked disabled>
                                    <label class="form-check-label" for="parent-dashboard">
                                        Dashboard
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                {{-- Admin Panel --}}
                                <div class="col-sm-6">
                                    <div class="form-check ">
                                        <input class="form-check-input" onclick="parent('admin');" type="checkbox"
                                            id="parent-admin" checked>
                                        <label class="form-check-label" for="parent-admin">
                                            Manajemen User
                                        </label>
                                    </div>
                                    <div class="form-check ms-4">
                                        <input name="manajemen_user_admin" class="form-check-input child-admin"
                                            onclick="child('admin');" type="checkbox" id="admin" checked>
                                        <label class="form-check-label" for="admin">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="form-check ms-4">
                                        <input name="manajemen_user_admin_role" class="form-check-input child-admin"
                                            onclick="child('admin');" type="checkbox" id="admin_role" checked>
                                        <label class="form-check-label" for="admin_role">
                                            Admin Role
                                        </label>
                                    </div>
                                </div>
                            </div>
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




    <!-- Modal Update-->
    <form action="{{ route('manajemen-user.admin-role.update') }}" method="post">
        @csrf
        @method('PUT')
        <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="editModalLabel" aria-hidden="true">
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
                        <h4 class="modal-title mb-4">Tambah Role</h4>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required id="name_update">
                        </div>
                        <label for="">Akses</label>
                        <div class="row">
                            <div class="col-sm-6">{{-- Dashboard --}}
                                <div class="form-check form_update ">
                                    <input class="form-check-input" onclick="parent('dashboard-update');"
                                        type="checkbox" id="parent-dashboard-update" checked disabled>
                                    <label class="form-check-label" for="parent-dashboard-update">
                                        Dashboard
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                {{-- Admin Panel --}}
                                <div class="col-sm-6">
                                    <div class="form-check form_update ">
                                        <input class="form-check-input" onclick="parent('admin-update');" type="checkbox"
                                            id="parent-admin-update" checked>
                                        <label class="form-check-label" for="parent-admin-update">
                                            Manajemen User
                                        </label>
                                    </div>
                                    <div class="form-check form_update ms-4">
                                        <input name="manajemen_user_admin" class="form-check-input child-admin-update"
                                            onclick="child('admin-update');" type="checkbox" id="admin" checked>
                                        <label class="form-check-label" for="admin">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="form-check form_update ms-4">
                                        <input name="manajemen_user_admin_role" class="form-check-input child-admin-update"
                                            onclick="child('admin-update');" type="checkbox" id="admin_role" checked>
                                        <label class="form-check-label" for="admin_role">
                                            Admin Role
                                        </label>
                                    </div>
                                </div>
                            </div>
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
@endsection
@push('js')
    <script>
        function parent() {
            const obj = document.getElementById('parent-' + arguments[0]);
            const child = document.querySelectorAll('.child-' + arguments[0]);
            for (var i = 0; i < child.length; i++) {
                if (obj.checked == true) {
                    child[i].checked = true;
                } else {
                    if (obj.checked == false) {
                        child[i].checked = false;
                    }
                }
            }

        }

        function child() {
            const obj = document.getElementById('parent-' + arguments[0]);
            const child = document.querySelectorAll('.child-' + arguments[0]);
            var bool = 0;

            for (var i = 0; i < child.length; i++) {
                if (child[i].checked) {
                    obj.checked = true;
                }
                bool += child[i].checked;
                console.log(bool);
            }
            if (bool == 0) {
                obj.checked = false;
            }
        }

        function remove() {
            const form = $('#form_remove_' + arguments[0]);
            swal({
                    title: `Apakah anda yakin ingin menghapus data ini?`,
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

        function update(){
            const data = obj.data[arguments[0]];
            const access = data.access
            console.log(access);
            $('#name_update').val(data.name);

            //Manajemen User
            access['manajemen-user']['admin'] || access['manajemen-user']['admin-role'] ? $('#parent-admin-update').prop("checked", true) : $('#parent-admin-update').prop("checked", false); 

            access['manajemen-user']['admin'] ? $('.form_update [name="manajemen_user_admin"]').prop("checked", true) : $('.form_update [name="manajemen_user_admin"]').prop("checked", false);
            access['manajemen-user']['admin-role'] ? $('.form_update [name="manajemen_user_admin_role"]').prop("checked", true) : $('.form_update [name="manajemen_user_admin_role"]').prop("checked", false);
        }

        const obj = {{ Js::from($data) }};
    </script>
@endpush
