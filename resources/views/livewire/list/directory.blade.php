<div role="button"
     class="flex items-center justify-between w-full p-3 py-1 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 font-bold"
     @click="$dispatch('change-directory', { directory: '{{ $directory }}' })"
>
    <div class="flex items-center gap-2 text-blue-gray-700">
        <div class="text-blue-gray-200">
            <x-tabler-folder-filled />
        </div>
        {{ $directory }}
    </div>

    <div
        class="p-2 text-gray-400 hover:text-red-800"
        wire:click.stop="delete('{{ $directory }}')"
        wire:confirm="{{ "Are you sure you want to delete directory \"$directory\"?" }}"
        @click="$dispatch('list-updated')"
    >
        <x-tabler-trash />
    </div>
</div>
