<?php

namespace App\Livewire;

use App\Models\Brand as ModelBrand;
use Livewire\Component;
use Livewire\WithPagination;

class Brand extends Component
{
    public $search = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.brand',[
            'data' => ModelBrand::where('name', 'ILIKE', '%'.$this->search.'%')->active()->paginate(10)
            // 'data' => ModelBrand::where('name', 'ILIKE', '%'.$this->search.'%')->active()->simplePaginate(10)
            // 'data' => ModelBrand::where('name', 'ILIKE', '%'.$this->search.'%')->active()->cursorPaginate(10)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
