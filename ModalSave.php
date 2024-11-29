<?php

namespace App\Livewire\Panel\Resume;

use App\Livewire\Forms\ResumeForm;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalSave extends Component
{
    public ResumeForm $form;

    public function render()
    {
        return view('livewire.panel.resume.modal-save');
    }

    #[On('closed.modal-save')]
    public function resetForm()
    {
        $this->form->uuid = '';
        $this->form->user_id = '';
        $this->form->description = '';
    }

    #[On('resume-edit')]
    public function edit($uuid)
    {
        try {
            $this->form->edit($uuid);
            $this->resetErrorBag();
        } catch (\Exception $e) {
            match ($e->getCode()) {
                403 => $this->dispatch('notify', msg: $e->getMessage(), type: "error"),
                default => $this->dispatch('notify', msg: "Não foi possível obter o registro.", type: "error")
            };
        }
    }

    public function submit()
    {
        $this->validate();

        try {
            $this->form->save();
            $this->dispatch('close-modal', ref: "modal-save");
            $this->dispatch('notify', msg: "Registrado com sucesso!", type: "success");
            $this->dispatch('refresh')->to(Index::class);
        } catch (\Exception $e) {
            match ($e->getCode()) {
                403 => $this->dispatch('notify', msg: $e->getMessage(), type: "error"),
                default => $this->dispatch('notify', msg: "Não foi possível salvar.", type: "error")
            };
        }
    }
}
