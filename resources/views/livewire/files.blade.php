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
                     class="flex items-center justify-between w-full p-3 py-1 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 font-bold"
                     wire:click="changeDirectory('{{ $directory }}')"
                     wire:key="directory-{{ $directory }}"
                >
                    <div class="flex items-center gap-2 text-blue-gray-700">
                        <div class="text-blue-gray-200">
                            <x-tabler-folder-filled />
                        </div>
                        {{ $directory }}
                    </div>

                    <div
                        class="p-2 text-gray-400 hover:text-red-800"
                        wire:click.stop="delete('{{ $directory }}', {{ true }})"
                        wire:confirm="{{ "Are you sure you want to delete directory \"$directory\"?" }}"
                    >
                        <x-tabler-trash />
                    </div>
                </div>
            @endforeach
            @foreach($this->files as $file)
                <div role="button"
                     class="flex items-center justify-between w-full p-3 py-1 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
                     wire:key="file-{{ $file }}"
                >
                    {{ $file }}

                    <div
                        class="p-2 text-gray-400 hover:text-red-800"
                        wire:click="delete('{{ $file }}')"
                        wire:confirm="{{ "Are you sure you want to delete \"$file\"?" }}"
                    >
                        <x-tabler-trash />
                    </div>
                </div>
            @endforeach
        </nav>

        <div wire:loading class="absolute inset-0 opacity-60 bg-blue-gray-50 grid place-content-center rounded-md *:size-16 *:animate-spin *:mx-auto">
            <x-tabler-loader-2 />
        </div>
    </div>
</div>
