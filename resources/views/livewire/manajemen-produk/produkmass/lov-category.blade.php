<div class="row">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="col-sm-12 mb-4">
        <div class="form-floating ">
            <input type="text" class="form-control" id="search" placeholder="Cari Lokasi"
                wire:model.live.debounce.500ms="search" aria-describedby="hehe">
            <label for="search">Cari Kategori...</label>
            <div id="hehe" class="form-text ms-2">ex: category name</div>
        </div>
    </div>
    <div class="col-sm-12">
        {{-- <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
          The current button
        </button> --}}
        <div class="list-group">
            @if ($data->count() > 0)
                @foreach ($data as $d)
                    @if ($d->nesting_level == 1)
                        <button type="button" class="list-group-item list-group-item-action fw-bold"
                            id="category_{{ $loop->index }}"
                            onclick="setbrand({{ $loop->index }},{{ $d->category_id }});">
                            {{ $d->name }}
                        </button>
                    @else
                        <button type="button" class="list-group-item list-group-item-action"
                            id="category_{{ $loop->index }}"
                            onclick="setCategory({{ $loop->index }},{{ $d->category_id }});">
                            <p>{{ $d->name }}</p>
                        </button>
                    @endif
                @endforeach
            @else
                <button type="button" class="list-group-item list-group-item-action" disabled>
                    <p class="text-center fw-bold">Tidak ada data...</p>
                </button>
            @endif
        </div>
    </div>

</div>

@push('js')
    <script>
        function setCategory() {
            $('#category').val($('#category_' + arguments[0]).text().trim());
            $('#category_value').val(arguments[1]);
            $('#categoryLOV_close').click();
        }
        $('#categoryLOV_reset').on('click',function(){
            $('#category').val('');
            $('#category_value').val('');
        })
    </script>
@endpush
