<div class="row">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="col-sm-12 mb-4">
        <div class="form-floating ">
            <input type="text" class="form-control" id="search" placeholder="Cari Lokasi" wire:model.live.debounce.500ms="search" aria-describedby="hehe">
            <label for="search">Cari Brand...</label>
            <div id="hehe" class="form-text ms-2">ex: brand name</div>
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
                        id="brand_{{ $loop->index }}"
                        onclick="setbrand({{ $loop->index }},{{ $d->brand_id }});"> {{ $d->name }}
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
        function setbrand() {
            $('#brand').val($('#brand_' + arguments[0]).text().trim());
            $('#brand_value').val(arguments[1]);
            $('#brandLOV_close').click();
        }

        $("#brandLOV_reset").on('click', function(){
            $('#brand').val('');
            $('#brand_value').val('');
        })
    </script>
@endpush
