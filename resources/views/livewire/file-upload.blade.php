<div
    x-data="{ uploading: false, progress: 0 }"
    x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="uploading = false"
    x-on:livewire-upload-cancel="uploading = false"
    x-on:livewire-upload-error="uploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
    class="relative"
>
    <form class="m-0" wire:submit="save">
        <div class="flex flex-col gap-8">
            <input
                type="file"
                wire:model="file"
                class="border border-gray-400 border-dashed p-4 w-full h-32"
            />

            <div class="text-black" x-show="uploading" x-cloak>
                Uploading: <span class="font-bold"><span x-text="progress"></span>%</span>
            </div>

            <button
                type="submit"
                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] max-w-fit self-end"
                :disabled="uploading"
            >
                Upload
            </button>
        </div>
    </form>
</div>
