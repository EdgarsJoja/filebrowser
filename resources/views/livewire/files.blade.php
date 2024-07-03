<div
    class="py-8"
    x-data
    @file-uploaded.window="$wire.$refresh()"
    @directory-created.window="$wire.$refresh()"
>
    <h1 class="text-4xl font-bold mb-8">File Browser</h1>

    <div class="mb-8">
        <livewire:menu :currentDirectory="$currentDirectory"/>
    </div>

    <div class="relative flex flex-col gap-4 text-gray-700 bg-white rounded-xl bg-clip-border w-full">
        <nav class="flex justify-between px-3">
            <ol class="inline-flex flex-wrap items-center mb-3 space-x-3 text-sm [&_.active-breadcrumb]:text-neutral-500/80 sm:mb-0">
                @foreach($this->fullPath as $pathPart)
                    <li>
                        <a
                            href="#_"
                            class="inline-flex items-center py-1 font-normal hover:text-blue-gray-900 focus:outline-none"
                        >
                            {{ $pathPart }}
                        </a>
                    </li>
                    <span class="mx-2 text-gray-400">/</span>
                @endforeach
            </ol>
        </nav>

        <nav
            class="flex min-w-[240px] flex-col gap-1 py-2 font-sans text-sm font-normal text-blue-gray-700 max-h-[75dvh] overflow-y-auto"
        >
            <div role="button"
                 class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 font-bold"
                 wire:click="changeDirectory('..')"
            >
                ..
            </div>
            @foreach($this->directories as $directory)
                <div role="button"
                     class="flex items-center justify-between w-full p-3 py-2 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 font-bold"
                     wire:click="changeDirectory('{{ $directory }}')"
                     wire:key="directory-{{ $directory }}"
                >
                    <div class="flex items-center gap-2 text-blue-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h240l80 80h320q33 0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Z"/></svg>
                        {{ $directory }}
                    </div>

                    <div
                        class="p-2 text-gray-400 hover:text-red-800"
                        wire:click.stop="delete('{{ $directory }}', {{ true }})"
                        wire:confirm="{{ "Are you sure you want to delete directory \"$directory\"?" }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                             fill="currentColor">
                            <path
                                d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                        </svg>
                    </div>
                </div>
            @endforeach
            @foreach($this->files as $file)
                <div role="button"
                     class="flex items-center justify-between w-full p-3 py-2 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
                     wire:key="file-{{ $file }}"
                >
                    {{ $file }}

                    <div
                        class="p-2 text-gray-400 hover:text-red-800"
                        wire:click="delete('{{ $file }}')"
                        wire:confirm="{{ "Are you sure you want to delete \"$file\"?" }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                             fill="currentColor">
                            <path
                                d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                        </svg>
                    </div>
                </div>
            @endforeach
        </nav>
    </div>
</div>
