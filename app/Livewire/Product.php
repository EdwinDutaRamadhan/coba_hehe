<?php

namespace App\Livewire;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
 

    public function render()
    {
        // return view('livewire.product',[
        //     'data' => Admin::where('name', 'ILIKE', '%'.$this->search.'%')->paginate(10)
        // ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
