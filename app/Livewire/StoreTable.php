<?php

namespace App\Livewire;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class StoreTable extends Component
{
    public $search = '';
    public $status = '';
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.store-table',[
            'data' => Store::where('name','ILIKE','%'.$this->search.'%')
            ->when($this->status == 'active', fn($query)=>$query->where('iud_status', 'i'))
            ->when($this->status == 'inactive', fn($query)=>$query->where('iud_status', 'd'))
            // ->orWhere('store_code', 'ILIKE', '%'.$this->search.'%')
            ->latest('updated_at')
            ->paginate(10)
        ]);
    }
}
