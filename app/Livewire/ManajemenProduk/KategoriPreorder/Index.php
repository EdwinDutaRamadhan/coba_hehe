<?php

namespace App\Livewire\ManajemenProduk\KategoriPreorder;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PreorderCategory;

class Index extends Component
{
    public $search = '';
    public $status;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.manajemen-produk.kategori-preorder.index',[
            'data' => PreorderCategory::where('name', 'ILIKE', '%'.$this->search.'%')
            ->when($this->status == 'active', fn($query)=>$query->where('iud_status','i'))
            ->when($this->status == 'inactive', fn($query)=>$query->where('iud_status','d'))
            ->latest('updated_at')
            ->simplePaginate(10)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
