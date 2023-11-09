<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PreorderCategory;

class KategoriPreorder extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.kategori-preorder',[
            // 'data' => PreorderCategory::where('name', 'ILIKE', '%'.$this->search.'%')->active()->paginate(10)
            'data' => PreorderCategory::where('name', 'ILIKE', '%'.$this->search.'%')->active()->simplePaginate(10)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
