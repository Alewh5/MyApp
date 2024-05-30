<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Empresa;

class ConfirmationModal extends Component
{
    public $confirmingPostDelete = false;
    public $empresaIdBeingDeleted = null;

    public function confirmingEmpresaDelete($empresa_id)
    {
        $this->confirmingPostDelete = true;
        $this->empresaIdBeingDeleted = $empresa_id;
    }
    
    public function showConfirmationModal($empresa_id)
    {
        $this->confirmingEmpresaDelete($empresa_id);
    }
    

    public function EmpresaDelete()
    {
        // Verifica si hay un ID válido antes de eliminar
        if ($this->empresaIdBeingDeleted) {
            // Encuentra la empresa por su ID y elimínala
            Empresa::find($this->empresaIdBeingDeleted)->delete();

            // Restablece el estado de confirmación
            $this->confirmingPostDelete = false;
            $this->empresaIdBeingDeleted = null;

            // Emitir un mensaje de éxito, si lo deseas
            session()->flash('message', '¡Empresa eliminada con éxito!');

            // Redirige al usuario a la página de inicio después de eliminar la empresa
            return redirect()->to('/');
        }
    }
    
    public function render()
    {
        return view('livewire.confirmation-modal');
    }
}
