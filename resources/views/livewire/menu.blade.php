<div class="flex gap-4">
    <div x-data="{ open: false }">
        <button
            class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] flex items-center gap-3"
            type="button"
            @click="open = true"
        >
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                <path
                    d="M438.5-338.87v-326.69L335.41-562.24l-58.89-58.41L480-824.13l203.48 203.48-58.89 58.41L521.5-665.56v326.69h-83Zm-171.91 155q-34.5 0-58.61-24.26t-24.11-58.74v-72h83v72h426.26v-72h83v72q0 34.48-24.27 58.74-24.27 24.26-58.77 24.26h-426.5Z"/>
            </svg>
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
                class="relative m-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white font-sans text-base font-light leading-relaxed text-blue-gray-500 antialiased shadow-2xl"
            >
                <div class="p-8">
                    <livewire:file-upload :currentDirectory="$currentDirectory" />
                </div>
            </div>
        </div>
    </div>

    <button
        class="px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
        type="button"
    >
        Create Folder
    </button>
</div>
