<div class="col-sm-6 mb-3">
    <label for="exampleDataList" class="form-label">Produk Kantong Plastik</label>
    <input class="form-control @error('plastic_product') is-invalid @enderror" list="datalistProdukKantongPlastik"
        id="exampleDataList" model: placeholder="Type to search..." wire:model.live.debounce.500ms="search"
        name="plastic_product" value="{{ old('plastic_product') }}">
    @error('plastic_product')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <datalist id="datalistProdukKantongPlastik">
        {{-- <option value="1. GAMBIR, GAMBIR, JAKARTA PUSAT, DKI JAKARTA 10110"></option>
        <option value="2. KEBON KELAPA, GAMBIR, JAKARTA PUSAT, DKI JAKARTA 10120">
        <option value="3. PETOJO UTARA, GAMBIR, JAKARTA PUSAT, DKI JAKARTA 10130">
        <option value="4. DURI PULO, GAMBIR, JAKARTA PUSAT, DKI JAKARTA 10140">
        <option value="5. CIDENG, GAMBIR, JAKARTA PUSAT, DKI JAKARTA 10150"> --}}
        @foreach ($data as $d)
            <option class="fw-bold" value="{{ $d->product_id }}. {{ $d->name }}">
        @endforeach
    </datalist>
</div>
