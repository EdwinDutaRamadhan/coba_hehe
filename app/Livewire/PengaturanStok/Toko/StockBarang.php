<?php

namespace App\Livewire\PengaturanStok\Toko;

use App\Models\Stock;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class StockBarang extends Component
{
    public $store;
    public $search;
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.pengaturan-stok.toko.stock-barang',[
            'data' => Stock::with('product')
            ->whereHas('product',fn($q)=>$q->where('name','ILIKE','%'.$this->search.'%')->orWhere('sku','ILIKE', '%'.$this->search.'%'))
            ->where('store_id',$this->store)
            ->paginate(10)
            ,
            // 'data' => Store::find($this->store)
            // ->stock()
            // // ->when($this->search, fn($query)=>$query->where('product.name', 'ILIKE', '%'.$this->search.'%'))
            // ->paginate(10),
            'store_data' => Store::find($this->store)
        ]);
    }

    public function mount($store_id){
        $this->store = $store_id;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
