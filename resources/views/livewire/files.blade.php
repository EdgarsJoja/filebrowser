<div
    class="py-8"
    x-data
    @file-uploaded.window="$wire.$refresh()"
    @directory-created.window="$wire.$refresh()"
>
    <h1 class="text-4xl font-bold mb-16 max-w-fit bg-gradient-to-r from-primary to-accent bg-clip-text text-transparent">
        File Browser
    </h1>

    <div class="mb-8">
        <livewire:menu :currentDirectory="$currentDirectory"/>
    </div>

    <div class="relative flex flex-col gap-4 text-neutral-content rounded-xl bg-clip-border w-full">
        <x-partials.breadcrumbs :currentDirectory="$this->currentDirectory" />

        <nav
            class="flex min-w-[240px] flex-col gap-1 py-2 font-sans text-sm font-normal max-h-[75dvh] overflow-y-auto"
        >
            <div role="button"
                 class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-neutral hover:text-neutral-content active:bg-neutral active:text-neutral-content focus:bg-neutral focus:text-neutral-content font-bold"
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

        <div wire:loading class="absolute inset-0 bg-neutral/50 grid place-content-center rounded-md">
            <x-loading class="size-12 mx-auto block" />
        </div>
    </div>
</div>
