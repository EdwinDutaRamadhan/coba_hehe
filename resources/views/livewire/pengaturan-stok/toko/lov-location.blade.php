<div class="row">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="col-sm-12 mb-4">
        <div class="form-floating ">
            <input type="text" class="form-control" id="search" placeholder="Cari Lokasi" wire:model.live.debounce.500ms="search" aria-describedby="hehe">
            <label for="search">Cari Lokasi...</label>
            <div id="hehe" class="form-text ms-2">ex: jawa tengah / salatiga / 50712</div>
        </div>
    </div>
    <div class="col-sm-12">
        {{-- <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
          The current button
        </button> --}}
        <div class="list-group">
            @if ($data->count() > 0)
                @foreach ($data as $d)
                    <button type="button" class="list-group-item list-group-item-action"
                        id="location_{{ $loop->index }}"
                        onclick="setInputLocation({{ $loop->index }},{{ $d->location_id }});">{{ $d->kelurahan }} {{ $d->kecamatan }} {{ $d->kabupaten }} {{ $d->provinsi }} {{ $d->kodepos }}
                    </button>
                @endforeach
            @else
                <button type="button" class="list-group-item list-group-item-action"  disabled><p class="text-center fw-bold">Tidak ada data...</p></button>
            @endif
        </div>
    </div>

</div>

@push('js')
    <script>
        function setInputLocation() {
            $('#location').val($('#location_' + arguments[0]).text().trim());
            $('#location_value').val(arguments[1]);
            $('#lovationLOV_close').click();
        }
    </script>
@endpush
