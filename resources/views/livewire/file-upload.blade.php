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
                <div class="relative w-full h-3 overflow-hidden rounded-full bg-gray-200">
                    <span :style="'width:' + progress + '%'" class="absolute w-24 h-full duration-300 ease-linear bg-gray-900" x-cloak></span>
                </div>
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
