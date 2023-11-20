<?php

namespace App\Livewire\ManajemenProduk\Produkmass;

use Livewire\Component;
use App\Models\ProductCategory;

class LovCategory extends Component
{
    public $search;
    
    public function render()
    {
        return view('livewire.manajemen-produk.produkmass.lov-category',[
            'data' => ProductCategory::where('name', 'ILIKE', '%'.$this->search.'%')
            ->active()
            ->limit(5)
            ->get()
        ]);
    }
}
