<div role="button"
     class="flex items-center justify-between w-full p-3 py-1 leading-tight transition-all rounded-lg outline-none text-start hover:bg-neutral hover:text-neutral-content active:bg-neutral active:text-neutral-content focus:bg-neutral focus:text-neutral-content font-bold group"
     @click="$dispatch('change-directory', { directory: '{{ $directory }}' })"
>
    <div class="flex items-center gap-2">
        <div class="text-neutral-content/50">
            <x-icon name="s-folder" />
        </div>
        {{ $directory }}
    </div>

    <div
        class="p-2 text-neutral group-hover:text-neutral-content hover:!text-red-800"
        wire:click.stop="delete('{{ $directory }}')"
        wire:confirm="{{ "Are you sure you want to delete directory \"$directory\"?" }}"
        @click="$dispatch('list-updated')"
    >
        <x-icon name="o-trash" />
    </div>
</div>
