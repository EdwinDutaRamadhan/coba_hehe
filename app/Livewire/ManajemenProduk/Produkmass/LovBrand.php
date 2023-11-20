<?php

namespace App\Livewire\ManajemenProduk\Produkmass;

use App\Models\Brand;
use Livewire\Component;

class LovBrand extends Component
{
    public $search = '';

    
    public function render()
    {
        return view('livewire.manajemen-produk.produkmass.lov-brand',[
            'data' => Brand::when($this->search, fn($query)=>$query->where('name', 'ILIKE', '%'.$this->search.'%'))
            ->limit(5)
            ->active()
            ->get()
        ]);
    }
}
