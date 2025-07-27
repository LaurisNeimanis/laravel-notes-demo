<?php

namespace App\Livewire\Notes;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Manager extends Component
{
    public $notes, $title, $body, $editingId = null;

    protected $rules = [
        'title' => 'required|string|max:255',
        'body'  => 'nullable|string',
    ];

    public function mount()
    {
        $this->loadNotes();
    }

    public function loadNotes()
    {
        $this->notes = Note::where('user_id', Auth::id())->latest()->get();
    }

    public function openCreateModal()
    {
        $this->reset(['title', 'body', 'editingId']);
        $this->dispatch('open-modal', 'notes-modal');
    }

    public function delete($id)
    {
        Note::where('user_id', Auth::id())->findOrFail($id)->delete();
        $this->loadNotes();
    }

    public function edit(Note $note)
    {
        $this->editingId = $note->id;
        $this->title     = $note->title;
        $this->body      = $note->body;

        $this->dispatch('open-modal', 'notes-modal');
    }

    public function save()
    {
        $this->validate();

        if ($this->editingId) {
            // Update
            $note = Note::where('user_id', Auth::id())->findOrFail($this->editingId);
            $note->update(['title' => $this->title, 'body' => $this->body]);
        } else {
            // Create
            Note::create([
                'user_id' => Auth::id(),
                'title'   => $this->title,
                'body'    => $this->body,
            ]);
        }

        $this->reset(['title', 'body', 'editingId']);
        $this->loadNotes();

        $this->dispatch('close-modal', 'notes-modal');
    }

    public function render()
    {
        return view('livewire.notes.manager');
    }
}
