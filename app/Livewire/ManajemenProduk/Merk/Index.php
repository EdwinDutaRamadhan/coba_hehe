<?php

namespace App\Livewire\ManajemenProduk\Merk;

use App\Models\Merk;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    
    public function render()
    {
        return view('livewire.manajemen-produk.merk.index',[
            'data' => Merk::where('name','ILIKE','%'.$this->search.'%')->active()->simplePaginate(10)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
