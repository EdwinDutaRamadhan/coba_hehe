<?php

namespace App\Livewire\ManajemenProduk\Produkmass;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    public $search = '';
    public $status;
    public $paginate = 10;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.manajemen-produk.produkmass.index',[
            'data' => Product::where('name','ILIKE','%'.substr($this->search,0,10).'%')
            ->when($this->status == 'inactive',fn($query)=>$query->where('iud_status','d'))
            ->when($this->status == 'active', fn($query)=>$query->where('iud_status','i'))
            ->latest('updated_at')
            ->paginate($this->paginate)
        ]);
    }

    public function updatingStatus(){
        $this->resetPage();
    }
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPaginate()
    {
        $this->resetPage();
    }
}
