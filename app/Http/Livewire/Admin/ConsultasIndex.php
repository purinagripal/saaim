<?php

namespace App\Http\Livewire\Admin;

use App\Models\Consulta;
use Livewire\Component;
use Livewire\WithPagination;


class ConsultasIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $consultas = Consulta::where('fecha','LIKE','%'.$this->search.'%')
                        ->orWhere('comentarios','LIKE','%'.$this->search.'%')
                        ->latest('fecha')
                        ->orderBy('id', 'desc')
                        ->paginate();

        return view('livewire.admin.consultas-index', compact('consultas'));
    }
}
