<?php

namespace App\Livewire\PengaturanStok\Toko;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class StockBarang extends Component
{
    public $store = 1;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.pengaturan-stok.toko.stock-barang',[
            'data' => Store::find($this->store)->stock()->paginate(10)
        ]);
    }

    public function mount($store_id){
        $this->store = $store_id;
    }
}
