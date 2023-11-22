<?php

namespace App\Livewire\ManajemenUser\AdminRole;

use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.manajemen-user.admin-role.index',[
            'data' => Role::active()->paginate(10)
        ]);
    }
}
