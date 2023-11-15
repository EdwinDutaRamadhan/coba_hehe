<div class="row">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="col-sm-12 mb-4">
        <div class="form-floating ">
            <input type="text" class="form-control" id="search" placeholder="Cari Lokasi" wire:model.live.debounce.500ms="search" aria-describedby="hoho">
            <label for="search">Cari Product...</label>
            <div id="hoho" class="form-text ms-2">ex: ultra milk</div>
        </div>
    </div>
    <div class="col-sm-12">
        {{-- <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
          The current button
        </button> --}}
        <div class="list-group">
            @if ($data->count() > 0)
                @foreach ($data as $d)
                    <button type="button" 
                    class="list-group-item list-group-item-action" id="plasticproduct_{{ $loop->index }}" 
                    onclick="setInputPlasticProduct({{ $loop->index }},{{ $d->product_id }});">{{ $d->name }}
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
        function setInputPlasticProduct() {
            $('#plastic_product').val($('#plasticproduct_' + arguments[0]).text().trim());
            $('#plastic_product_value').val(arguments[1]);
            $('#plastic_productLOV_close').click();
        }
    </script>
@endpush
