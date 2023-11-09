<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Merk as ModelMerk;

class Merk extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    
    public function render()
    {
        return view('livewire.merk',[
            'data' => ModelMerk::where('name','ILIKE','%'.$this->search.'%')->active()->paginate(10)
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
