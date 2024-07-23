<div class="flex flex-col sm:flex-row gap-4 sm:items-center">
    <div x-data="{ open: false }" @file-uploaded.window="open = false">
        <x-button label="Upload Files" icon="o-arrow-up-tray" @click="open = true" class="btn-primary" />
        <div
            x-show="open"
            x-transition.opacity
            x-cloak
            class="fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-neutral/20 backdrop-blur-sm duration-300"
        >
            <div
                @click.outside="open = false"
                class="relative m-4 w-full min-w-[40%] max-w-[80%] lg:max-w-[600px] rounded-lg bg-base-200 font-sans text-base font-light leading-relaxed antialiased shadow-lg"
            >
                <div class="p-8">
                    <livewire:file-upload :currentDirectory="$currentDirectory" />
                </div>
            </div>
        </div>
    </div>

    <div x-data="{ open: false }" @directory-created.window="open = false">
        <x-button label="Create Folder" icon="o-folder-plus" @click="open = true" />
        <div
            x-show="open"
            x-transition.opacity
            x-cloak
            class="fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-neutral/20 backdrop-blur-sm duration-300"
        >
            <div
                @click.outside="open = false"
                class="relative m-4 w-full min-w-[40%] max-w-[80%] lg:max-w-[600px] rounded-lg font-sans text-base font-light leading-relaxed antialiased shadow-lg bg-base-200"
            >
                <div class="p-8">
                    <livewire:create-folder :currentDirectory="$currentDirectory" />
                </div>
            </div>
        </div>
    </div>
</div>
