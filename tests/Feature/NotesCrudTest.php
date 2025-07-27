<?php

namespace Tests\Feature;

use App\Livewire\Notes\Manager;
use App\Models\User;
use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class NotesCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(); // Demo user no DatabaseSeeder
    }

    public function test_guest_cannot_access_notes()
    {
        $response = $this->get('/notes');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_notes_page()
    {
        $user = User::first(); // Demo user no seeder
        $this->actingAs($user);

        $response = $this->get('/notes');
        $response->assertStatus(200);
        $response->assertSee('Manage Your Notes');
    }

    public function test_user_can_create_note_with_livewire()
    {
        $user = User::first();
        $this->actingAs($user);

        Livewire::test(Manager::class)
            ->set('title', 'Test Note')
            ->set('body', 'This is a test note')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('notes', [
            'title' => 'Test Note',
            'body'  => 'This is a test note',
            'user_id' => $user->id,
        ]);
    }

    public function test_user_can_update_note_with_livewire()
    {
        $user = User::first();
        $this->actingAs($user);

        $noteId = Note::create([
            'user_id' => $user->id,
            'title'   => 'Old Title',
            'body'    => 'Old Body',
        ])->id;

        Livewire::test(Manager::class)
            ->call('edit', $noteId)
            ->set('title', 'Updated Title')
            ->set('body', 'Updated Body')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('notes', [
            'title' => 'Updated Title',
            'body'  => 'Updated Body'
        ]);
    }

    public function test_user_can_delete_note_with_livewire()
    {
        $user = User::first();
        $this->actingAs($user);

        $note = Note::create([
            'user_id' => $user->id,
            'title'   => 'Delete Me',
            'body'    => 'Delete Body',
        ]);

        Livewire::test(Manager::class)
            ->call('delete', $note->id);

        $this->assertDatabaseMissing('notes', [
            'id' => $note->id
        ]);
    }
}
