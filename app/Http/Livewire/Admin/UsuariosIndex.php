<?php

namespace App\Http\Livewire\Admin;

use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $usuarios = Usuario::where('nombre','LIKE','%'.$this->search.'%')
                        ->latest('id')
                        ->paginate();
        // TO.DO buscar por otras cosas                        

        return view('livewire.admin.usuarios-index', compact('usuarios'));
    }
}
