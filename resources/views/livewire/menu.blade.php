<div class="flex flex-col sm:flex-row gap-4">
    <div x-data="{ open: false }" @file-uploaded.window="open = false">
        <button
            class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] flex items-center gap-3 w-full"
            type="button"
            @click="open = true"
        >
            <x-tabler-upload />
            Upload Files
        </button>
        <div
            x-show="open"
            x-transition.opacity
            x-cloak
            class="fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 backdrop-blur-sm duration-300"
        >
            <div
                @click.outside="open = false"
                class="relative m-4 w-full min-w-[40%] max-w-[80%] lg:max-w-[600px] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl"
            >
                <div class="p-8">
                    <livewire:file-upload :currentDirectory="$currentDirectory" />
                </div>
            </div>
        </div>
    </div>

    <div x-data="{ open: false }" @directory-created.window="open = false">
        <button
            class="px-4 py-2 h-full font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none flex items-center gap-3 w-full"
            type="button"
            @click="open = true"
        >
            <x-tabler-folder-plus />
            Create Folder
        </button>
        <div
            x-show="open"
            x-transition.opacity
            x-cloak
            class="fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 backdrop-blur-sm duration-300"
        >
            <div
                @click.outside="open = false"
                class="relative m-4 w-full min-w-[40%] max-w-[80%] lg:max-w-[600px] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl"
            >
                <div class="p-8">
                    <livewire:create-folder :currentDirectory="$currentDirectory" />
                </div>
            </div>
        </div>
    </div>
</div>
