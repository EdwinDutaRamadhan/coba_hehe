<?php

namespace App\Livewire\PengaturanStok\Toko;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $search = '';
    public $status = '';
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    
    public function render()
    {
        return view('livewire.pengaturan-stok.toko.index',[
            'data' => Store::where('name','ILIKE','%'.$this->search.'%')
            ->when($this->status == 'active', fn($query)=>$query->where('iud_status', 'i'))
            ->when($this->status == 'inactive', fn($query)=>$query->where('iud_status', 'd'))
            // ->orWhere('store_code', 'ILIKE', '%'.$this->search.'%')
            ->latest('updated_at')
            ->paginate(10)
        ]);
    }
}
