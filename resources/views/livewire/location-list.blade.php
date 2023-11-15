<div class="col-sm-6 mb-3">
    <label for="exampleDataList" class="form-label">Lokasi Toko</label>
    <input class="form-control @error('location') is-invalid @enderror" list="datalistOptions" id="exampleDataList"
        placeholder="Type to search..." wire:model.live="search" name="location" >
    @error('location')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    <datalist id="datalistOptions">
        {{-- <option value="1. GAMBIR, GAMBIR, JAKARTA PUSAT, DKI JAKARTA 10110"></option>
        <option value="2. KEBON KELAPA, GAMBIR, JAKARTA PUSAT, DKI JAKARTA 10120">
        <option value="3. PETOJO UTARA, GAMBIR, JAKARTA PUSAT, DKI JAKARTA 10130">
        <option value="4. DURI PULO, GAMBIR, JAKARTA PUSAT, DKI JAKARTA 10140">
        <option value="5. CIDENG, GAMBIR, JAKARTA PUSAT, DKI JAKARTA 10150"> --}}
        @foreach ($data as $d)
            <option
                value="{{ $d->location_id }}. {{ $d->kelurahan }} {{ $d->kecamatan }} {{ $d->kabupaten }} {{ $d->provinsi }} {{ $d->kodepos }}">
        @endforeach
    </datalist>
</div>
