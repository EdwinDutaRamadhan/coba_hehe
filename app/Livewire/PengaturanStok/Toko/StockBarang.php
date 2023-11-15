<?php

namespace App\Livewire\PengaturanStok\Toko;

use App\Models\Store;
use Livewire\Component;

class StockBarang extends Component
{
    public $store = 1;
    
    public function render()
    {
        return view('livewire.pengaturan-stok.toko.stock-barang',[
            'data' => Store::find($this->store)
        ]);
    }

    public function mount($store_id){
        $this->store = $store_id;
    }
}
