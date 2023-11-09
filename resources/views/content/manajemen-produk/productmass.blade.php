@extends('layout.main')

@section('title')
    Productmass
@endsection

@push('css')
    @livewireStyles

@endpush

@section('content')
    {{-- top navbar --}}

    @include('partials.navbar')



    {{-- top navbar --}}
    @livewire('productmass')
@endsection

@push('js')
    @livewireScripts

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
    </script>
@endpush
