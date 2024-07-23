<div role="button"
     class="flex items-center justify-between w-full p-3 py-1 leading-tight transition-all rounded-lg outline-none text-start break-all hover:bg-base-100 active:bg-base-100 focus:bg-base-100"
>
    {{ $file }}

    <div
        class="p-2 hover:text-red-800"
        wire:click="delete('{{ $file }}')"
        wire:confirm="{{ "Are you sure you want to delete \"$file\"?" }}"
        @click="$dispatch('list-updated')"
    >
        <x-icon name="o-trash" />
    </div>
</div>
