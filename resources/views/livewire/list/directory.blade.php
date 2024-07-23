<div role="button"
     class="flex items-center justify-between w-full p-3 py-1 leading-tight transition-all rounded-lg outline-none text-start hover:bg-base-100 active:bg-base-100 focus:bg-base-100 font-bold"
     @click="$dispatch('change-directory', { directory: '{{ $directory }}' })"
>
    <div class="flex items-center gap-2">
        <x-icon name="s-folder" />
        {{ $directory }}
    </div>

    <div
        class="p-2 hover:text-red-800"
        wire:click.stop="delete('{{ $directory }}')"
        wire:confirm="{{ "Are you sure you want to delete directory \"$directory\"?" }}"
        @click="$dispatch('list-updated')"
    >
        <x-icon name="o-trash" />
    </div>
</div>
