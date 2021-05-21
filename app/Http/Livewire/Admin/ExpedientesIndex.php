<?php

namespace App\Http\Livewire\Admin;

use App\Models\Expediente;
use Livewire\Component;
use Livewire\WithPagination;

class ExpedientesIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $expedientes = Expediente::where('nombre','LIKE','%'.$this->search.'%')
                        ->orWhere('apellidos','LIKE','%'.$this->search.'%')
                        ->latest('id')
                        ->paginate();

        return view('livewire.admin.expedientes-index', compact('expedientes'));
    }
}
