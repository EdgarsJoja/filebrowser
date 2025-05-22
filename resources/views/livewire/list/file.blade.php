<div
    role="button"
    class="flex items-center justify-between w-full p-3 py-1 leading-tight transition-all rounded-lg outline-none text-start break-all hover:bg-base-100 active:bg-base-100 focus:bg-base-100"
>
    {{ $file }}

    <x-dropdown>
        <x-slot:trigger>
            <x-button icon="o-ellipsis-vertical" class="btn-circle btn-sm btn-ghost" />
        </x-slot:trigger>

        <x-menu-item
            title="Delete"
            class="text-red-700"
            @click="$wire.confirmDeleteModal = true"
        />
    </x-dropdown>

    <x-modal wire:model="confirmDeleteModal" title="Are you sure?">
        <div>Delete file "<b class="text-accent">{{ $file }}</b>"?</div>

        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.confirmDeleteModal = false" />
            <x-button label="Confirm" class="btn-warning" wire:click="delete('{{ $file }}')" spinner="delete" />
        </x-slot:actions>
    </x-modal>
</div>
