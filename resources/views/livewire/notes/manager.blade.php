<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Manage Your Notes') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Create, view, and organize your notes in one place.') }}
        </p>
    </header>

    <div class="mt-6 space-y-6">
        <div class="flex items-center gap-4">
            <x-primary-button type="button" wire:click="openCreateModal">{{ __('Add Note') }}</x-primary-button>
        </div>

        <ul class="mt-4 space-y-2">
            @foreach ($notes as $note)
                <li wire:key="note-{{ $note->id }}"
                    class="border border-gray-300 dark:border-gray-700 p-2 flex justify-between items-center rounded-md ">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $note->title }}</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 whitespace-pre-line">{{ $note->body }}
                        </p>
                    </div>
                    <div class="space-x-1">
                        <x-primary-button type="button" wire:click="edit({{ $note->id }})">
                            Edit
                        </x-primary-button>
                        <x-danger-button type="button" wire:click="delete({{ $note->id }})">
                            Delete
                        </x-danger-button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Modal --}}
    <x-modal name="notes-modal" :show="false">
        <form wire:submit.prevent="save" class="p-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ $editingId ? __('Edit Note') : __('Add Note') }}
            </h2>

            <div class="mt-6">
                <x-input-label :value="__('Title')" />
                <x-text-input wire:model.defer="title" class="w-full mb-5" />
                <x-input-label :value="__('Body')" />
                <x-text-area wire:model.defer="body" rows="4" class="w-full" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-primary-button class="ms-3">
                    {{ $editingId ? __('Update') : __('Create') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>
</section>
