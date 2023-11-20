<div class="row">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="col-sm-12 mb-4">
        <div class="form-floating ">
            <input type="text" class="form-control" id="search" placeholder="Cari Lokasi"
                wire:model.live.debounce.500ms="search" aria-describedby="hehe">
            <label for="search">Cari Preorder Kategori...</label>
            <div id="hehe" class="form-text ms-2">ex: preorder category name</div>
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
                        id="preorder_category_{{ $loop->index }}"
                        onclick="setPreorderCategory({{ $loop->index }},{{ $d->preorder_category_id }});">
                        {{ $d->name }}
                    </button>
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
        function setPreorderCategory() {
            $('#preorder_category').val($('#preorder_category_' + arguments[0]).text().trim());
            $('#preorder_category_value').val(arguments[1]);
            $('#preorder_categoryLOV_close').click();
        }

        $('#preorder_categoryLOV_reset').on('click', function(){
            $('#preorder_category').val('');
            $('#preorder_category_value').val('');
        })
    </script>
@endpush
