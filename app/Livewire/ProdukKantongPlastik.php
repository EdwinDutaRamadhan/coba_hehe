<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProdukKantongPlastik extends Component
{
    public $search = '';
    public function render()
    {
        return view('livewire.produk-kantong-plastik',[
            'data' => Product::where('name', 'ILIKE', '%'.$this->search.'%')
            ->limit(5)
            ->get()
        ]);
    }
}
