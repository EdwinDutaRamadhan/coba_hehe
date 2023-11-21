@extends('layout.main')

@section('title')
    Kategori Preorder
@endsection

@push('css')
    @livewireStyles
@endpush

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')



    {{-- top navbar --}}
    @livewire('manajemen-produk.kategori-preorder.index')

    <!-- Preorder Add-->
    <form action="{{ route('manajmen-produk.kategori-preorder.store') }}" method="post">
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
                        <h4 class="modal-title mb-4">Tambah Kategori Preorder</h4>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" required placeholder="Kategori Preorder">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="status" class="form-label">Status Aktif</label>
                                    <select name="status" id="status" class="form-select"
                                        aria-label="Default select example">
                                        <option value="1">Ya</option>
                                        <option selected value="0">Tidak</option>
                                    </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="min_day_est" class="form-label">Min Day Estimasi</label>
                                    <input id="min_day_est" type="number" class="form-control" name="min_day_est" value="0" required>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="max_day_est" class="form-label">Max Day Estimasi</label>
                                    <input id="max_day_est" type="number" class="form-control" name="max_day_est" value="1" required>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="start_time">Start Time</label>
                                    <input class="form-control" type="time" name="start_time" id="start_time" value="00:00">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="end_time">End Time</label>
                                    <input class="form-control" type="time" name="end_time" id="end_time" value="23:59">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-radius: 10px;background-color: #E11D37;">
                        <button class="btn btn-outline-light" style="border-radius: 10px;" type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="submit" onclick="eksekusi();" class="btn btn-outline-light"
                            style="border-radius: 10px;">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Preorder Edit-->
    <form action="{{ route('manajmen-produk.kategori-preorder.update') }}" method="post">
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
                        <h4 class="modal-title mb-4">Edit Kategori Preorder</h4>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input id="name_update" type="text" class="form-control" name="name" required placeholder="Kategori Preorder">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="status" class="form-label">Status Aktif</label>
                                    <select name="status" id="status_update" class="form-select"
                                        aria-label="Default select example">
                                        <option value="1">Ya</option>
                                        <option selected value="0">Tidak</option>
                                    </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="min_day_est" class="form-label">Min Day Estimasi</label>
                                    <input id="min_day_est_update" type="number" class="form-control" name="min_day_est" value="0" required>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="max_day_est" class="form-label">Max Day Estimasi</label>
                                    <input id="max_day_est_update" type="number" class="form-control" name="max_day_est" value="1" required>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="start_time">Start Time</label>
                                    <input class="form-control" type="time" name="start_time" id="start_time_update" value="00:00">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="form-group">
                                    <label for="end_time">End Time</label>
                                    <input class="form-control" type="time" name="end_time" id="end_time_update" value="23:59">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-radius: 10px;background-color: #E11D37;">
                        <button class="btn btn-outline-light" style="border-radius: 10px;" type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="submit" onclick="eksekusi();" class="btn btn-outline-light"
                            style="border-radius: 10px;">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('js')
    @livewireScripts

    <script>
        //id , message
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

        function update(){
            const data = obj.data[arguments[0]];
            console.log(data);
            $('#name_update').val(data.name);
            data.iud_status == 'i' ? $('#status_update').val("1").change() : $('#status_update').val("0").change();
            $('#min_day_est_update').val(data.min_day_est);
            $('#max_day_est_update').val(data.max_day_est);
            data.start_time == null ? $('#start_time_update').val('') : $('#start_time_update').val(data.start_time.substring(0,2)+':'+data.start_time.substring(3,5));
            data.end_time == null ? $('#end_time_update').val('') : $('#end_time_update').val(data.end_time.substring(0,2)+':'+data.end_time.substring(3,5));
        }
    </script>
@endpush
