@extends('layout.main')

@section('title')
    Admin
@endsection

@push('css')
@endpush

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')



    {{-- top navbar --}}

    {{-- main content --}}

    @livewire('manajemen-user.admin.index')


    {{-- main content --}}


    <!-- Modal Add-->
    <form action="" method="post">
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
                        <form action="{{ route('manajemen-user.admin.store') }}" method="post">
                            @csrf
                            <h4 class="modal-title mb-4">Buat Admin</h4>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label for="name_add">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name_add" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label for="email_add">Email</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email_add" value="{{ old('email') }}"
                                            placeholder="alfamidi@gmail.com">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label for="password_add">Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            id="password_add">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <div class="form-group">
                                        <label for="password_confirmation_add">Password</label>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" id="password_confirmation_add">
                                        @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select class="form-select" aria-label="Default select example" name="role">
                                            @foreach ($role as $r)
                                                @if (old('role') !== null)
                                                    @if (old('role') == $r->role_id)
                                                        <option value="{{ old('role') }}" selected>{{ $r->name }}
                                                        </option>
                                                    @endif
                                                @else
                                                    <option value="{{ $r->role_id }}">{{ $r->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
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


    {{-- footer --}}

    {{-- @include('partials.footer') --}}

    {{-- footer --}}
@endsection

@push('js')
    @if ($errors->any())
        <script>
            var myModal = new bootstrap.Modal(document.getElementById('addModal'))
            myModal.show();
        </script>
    @endif

    <script>
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
        const obj = {{ Js::from($data) }};
    </script>

@endpush
