<div
    class="py-8"
    x-data
    @file-uploaded.window="$wire.$refresh()"
    @directory-created.window="$wire.$refresh()"
>
    <div class="mb-8">
        <livewire:menu :currentDirectory="$currentDirectory"/>
    </div>

    <div class="relative flex flex-col gap-4 rounded-xl bg-clip-border w-full">
        <x-stat
            title="Size"
            value="{{ $this->size }}"
            icon="o-folder"
            color="text-primary"
        />

        <x-input icon="o-magnifying-glass" wire:model.live.debounce.300ms="filter" placeholder="filter items..." clearable />
        <x-partials.breadcrumbs :currentDirectory="$this->currentDirectory" />

        <nav
            class="flex min-w-[240px] flex-col gap-1 pt-2 pb-8 text-sm font-normal max-h-[75dvh] overflow-y-auto"
        >
            <div role="button"
                 class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-base-100 active:bg-base-100 focus:bg-base-100 font-bold"
                 wire:click="changeDirectory('..')"
            >
                <x-icon name="o-arrow-uturn-left" />
            </div>
            @foreach($this->directories as $directory)
                @php $key = "file-$this->currentDirectory-$directory" @endphp
                <livewire:list.directory :currentDirectory="$this->currentDirectory" :directory="$directory" :key="$key" />
            @endforeach
            @foreach($this->files as $file)
                @php $key = "file-$this->currentDirectory-$file" @endphp
                <livewire:list.file :currentDirectory="$this->currentDirectory" :file="$file" :key="$key" />
            @endforeach

            @if(!$this->directories && !$this->files)
                <p class="text-center py-4">Empty</p>
            @endif
        </nav>

        <div wire:loading class="absolute inset-0 bg-base-100/80 grid place-content-center rounded-md">
            <x-loading class="size-12 mx-auto block text-primary" />
        </div>
    </div>
</div>
