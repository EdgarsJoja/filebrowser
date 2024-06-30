<div class="py-8">
    <div class="mb-8">
        <livewire:menu :currentDirectory="$currentDirectory"/>
    </div>

    <div class="relative flex flex-col gap-8 text-gray-700 bg-white rounded-xl bg-clip-border w-full">
        <nav aria-label="breadcrumb" class="block w-full">
            <ol class="flex flex-wrap items-center w-full px-4 py-2 rounded-md bg-blue-gray-50 bg-opacity-60">
                @foreach($this->fullPath as $pathPart)
                    <li class="flex items-center font-sans text-sm antialiased font-normal leading-normal transition-colors duration-300 cursor-pointer text-blue-gray-900 hover:text-light-blue-500">
                        <a href="#" class="opacity-60">
                            {{ $pathPart }}
                        </a>
                        <span
                            class="mx-2 font-sans text-sm antialiased font-normal leading-normal pointer-events-none select-none text-blue-gray-500">
                            /
                        </span>
                    </li>
                @endforeach
            </ol>
        </nav>

        <nav class="flex min-w-[240px] flex-col gap-1 p-2 font-sans text-base font-normal text-blue-gray-700 max-h-[75dvh] overflow-y-auto">
            <div role="button"
                 class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 font-bold"
                 wire:click="changeDirectory('..')"
            >
                ..
            </div>
            @foreach($this->directories as $directory)
                <div role="button"
                     class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900 font-bold"
                     wire:click="changeDirectory('{{ $directory }}')"
                     wire:key="directory-{{ $directory }}"
                >
                    {{ $directory }}
                </div>
            @endforeach
            @foreach($this->files as $file)
                <div role="button"
                     class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-blue-gray-50 hover:bg-opacity-80 hover:text-blue-gray-900 focus:bg-blue-gray-50 focus:bg-opacity-80 focus:text-blue-gray-900 active:bg-blue-gray-50 active:bg-opacity-80 active:text-blue-gray-900"
                     wire:key="file-{{ $file }}"
                >
                    {{ $file }}
                </div>
            @endforeach
        </nav>
    </div>
</div>
