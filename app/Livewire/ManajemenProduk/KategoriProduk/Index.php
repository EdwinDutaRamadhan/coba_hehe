<?php

namespace App\Livewire\ManajemenProduk\KategoriProduk;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCategory;

class Index extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.manajemen-produk.kategori-produk.index',[
            'data' => ProductCategory::where('name', 'ILIKE', '%'.$this->search.'%')->active()->paginate(10)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
