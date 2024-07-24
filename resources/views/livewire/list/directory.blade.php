<div role="button"
     class="flex items-center justify-between w-full p-3 py-1 leading-tight transition-all rounded-lg outline-none text-start hover:bg-base-100 active:bg-base-100 focus:bg-base-100"
     @click="$dispatch('change-directory', { directory: '{{ $directory }}' })"
>
    <div class="flex items-center gap-2 font-bold">
        <x-icon name="s-folder" />
        {{ $directory }}
    </div>

    <x-dropdown>
        <x-slot:trigger>
            <x-button icon="o-ellipsis-vertical" class="btn-circle btn-sm btn-ghost" @click.stop="open = !open" />
        </x-slot:trigger>

        <x-menu-item
            title="Delete"
            class="text-red-700"
            @click.stop="$wire.confirmDeleteModal = true"
        />
    </x-dropdown>

    <x-modal wire:model="confirmDeleteModal" title="Are you sure?" @click.stop="">
        <div>Delete directory "<b class="text-accent">{{ $directory }}</b>"?</div>
        <div class="text-warning mt-2">Note: This will also delete all of its contents.</div>

        <x-slot:actions>
            <x-button label="Cancel" @click="$wire.confirmDeleteModal = false" />
            <x-button label="Confirm" class="btn-warning" wire:click="delete('{{ $directory }}')" spinner="delete" />
        </x-slot:actions>
    </x-modal>
</div>
