<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Productmass extends Component
{
    public $search = '';
    public $status;
    public $paginate = 10;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.productmass',[
            // 'data' => Product::where('name','ILIKE','%'.$this->search.'%')->paginate(10)
            'data' => Product::where('name','ILIKE','%'.$this->search.'%')
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
