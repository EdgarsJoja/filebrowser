<div role="button"
     class="flex items-center justify-between w-full p-3 py-1 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 break-all"
>
    {{ $file }}

    <div
        class="p-2 text-gray-400 hover:text-red-800"
        wire:click="delete('{{ $file }}')"
        wire:confirm="{{ "Are you sure you want to delete \"$file\"?" }}"
        @click="$dispatch('list-updated')"
    >
        <x-tabler-trash />
    </div>
</div>
