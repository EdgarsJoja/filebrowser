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
        <x-partials.breadcrumbs :currentDirectory="$this->currentDirectory" />

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
                @php $key = "file-$this->currentDirectory-$directory" @endphp
                <livewire:list.directory :currentDirectory="$this->currentDirectory" :directory="$directory" :key="$key" />
            @endforeach
            @foreach($this->files as $file)
                @php $key = "file-$this->currentDirectory-$file" @endphp
                <livewire:list.file :currentDirectory="$this->currentDirectory" :file="$file" :key="$key" />
            @endforeach
        </nav>

        <div wire:loading class="absolute inset-0 opacity-60 bg-blue-gray-50 grid place-content-center rounded-md *:size-16 *:animate-spin *:mx-auto">
            <x-tabler-loader-2 />
        </div>
    </div>
</div>
