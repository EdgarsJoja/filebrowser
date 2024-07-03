<div class="flex flex-col sm:flex-row gap-4">
    <div x-data="{ open: false }" @file-uploaded.window="open = false">
        <button
            class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] flex items-center gap-3 w-full"
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
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M560-320h80v-80h80v-80h-80v-80h-80v80h-80v80h80v80ZM160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h240l80 80h320q33 0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Z"/></svg>
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
