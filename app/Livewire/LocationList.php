<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Location;

class LocationList extends Component
{
    public $search = '';
    
    public function render()
    {
        return view('livewire.location-list',[
            'data' => Location::where('kecamatan', 'ILIKE', '%'.$this->search.'%')
            ->orWhere('kabupaten', 'ILIKE', '%'.$this->search.'%')
            ->orWhere('kodepos', 'ILIKE', '%'.$this->search.'%')
            ->limit(5)
            ->get()
        ]);
    }
}
