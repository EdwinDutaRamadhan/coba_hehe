<?php

namespace App\Livewire\PengaturanStok\Toko;

use App\Models\Product;
use Livewire\Component;

class LovProductKantongPlastik extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.pengaturan-stok.toko.lov-product-kantong-plastik',[
            'data' => Product::where('name', 'ILIKE', '%'.$this->search.'%')
            ->limit(5)
            ->get()
        ]);
    }
}
