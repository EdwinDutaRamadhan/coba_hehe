<?php

namespace App\Livewire;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class TableAdmin extends Component
{
    public $tasearch = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        return view('livewire.table-admin',[
            'data' => Admin::where('name', 'ILIKE', '%'.$this->tasearch.'%')->active()->paginate(10)
        ]);
    }

    public function updatingTasearch()
    {
        $this->resetPage();
    }
}
