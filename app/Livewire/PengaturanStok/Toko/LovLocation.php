<?php

namespace App\Livewire\PengaturanStok\Toko;

use Livewire\Component;
use App\Models\Location;

class LovLocation extends Component
{
    public $search;
    
    public function render()
    {
        return view('livewire.pengaturan-stok.toko.lov-location',[
            'data' => Location::where('provinsi', 'ILIKE', '%'.$this->search.'%')
            ->orWhere('kabupaten', 'ILIKE', '%'.$this->search.'%')
            ->orWhere('kecamatan', 'ILIKE', '%'.$this->search.'%')
            ->orWhere('kodepos', 'ILIKE', '%'.$this->search.'%')
            ->limit(5)
            ->get()
        ]);
    }
}
