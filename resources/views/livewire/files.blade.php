<div class="py-8">
    <div class="mb-8">
        <livewire:menu />
    </div>

    <div class="relative flex flex-col text-gray-700 bg-white rounded-xl bg-clip-border w-full">
        <nav class="flex min-w-[240px] flex-col gap-1 p-2 font-sans text-base font-normal text-blue-gray-700">
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
