<?php

namespace App\Livewire\ManajemenProduk\Produkmass;

use Livewire\Component;
use App\Models\PreorderCategory;

class LovPreorderCategory extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.manajemen-produk.produkmass.lov-preorder-category',[
            'data' => PreorderCategory::where('name','ILIKE','%'.$this->search.'%')
            ->active()
            ->limit(5)
            ->get()
        ]);
    }
}
