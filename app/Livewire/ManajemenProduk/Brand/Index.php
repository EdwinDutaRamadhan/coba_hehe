<?php

namespace App\Livewire\ManajemenProduk\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.manajemen-produk.brand.index',[
            'data' => Brand::where('name', 'ILIKE', '%'.$this->search.'%')->active()->paginate(10)
        ]);
    }
}
