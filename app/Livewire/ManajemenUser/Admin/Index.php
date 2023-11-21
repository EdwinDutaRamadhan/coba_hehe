<?php

namespace App\Livewire\ManajemenUser\Admin;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $tasearch = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    
    public function render()
    {
        return view('livewire.manajemen-user.admin.index',[
            'data' => Admin::where('name', 'ILIKE', '%'.$this->tasearch.'%')->active()->paginate(10)
        ]);
    }

    public function updatingTasearch()
    {
        $this->resetPage();
    }
}
