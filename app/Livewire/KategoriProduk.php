<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCategory;

class KategoriProduk extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.kategori-produk', [
            'data' => ProductCategory::where('name', 'ILIKE', '%'.$this->search.'%')->active()->paginate(10)
        ]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
