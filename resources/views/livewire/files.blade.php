<div
    class="py-8"
    x-data
    @file-uploaded.window="$wire.$refresh()"
    @directory-created.window="$wire.$refresh()"
>
    <div class="mb-8">
        <livewire:menu :currentDirectory="$currentDirectory"/>
    </div>

    <div
        class="relative grid rounded-xl bg-clip-border w-full"
        x-data="{ showToolbar: true }"
    >
        <div
            class="grid transition-all duration-500"
            :class="showToolbar ? 'grid-rows-[1fr] mb-4' : 'grid-rows-[0fr]'"
        >
            <div class="flex flex-col gap-4 overflow-y-hidden">
                <div class="flex gap-4 overflow-x-auto">
                    <div class="shrink-0">
                        <x-stat
                            title="Size"
                            value="{{ $this->size }}"
                            icon="o-folder"
                            color="text-accent"
                        />
                    </div>
                    <div class="shrink-0">
                        <x-stat
                            title="Last modified"
                            value="{{ $this->lastModified }}"
                            icon="o-clock"
                            color="text-accent"
                        />
                    </div>
                </div>

                <div class="mb-2">
                    <x-input
                        icon="o-magnifying-glass"
                        wire:model.live.debounce.300ms="filter"
                        placeholder="filter items..."
                        class="bg-neutral"
                        clearable
                    />
                </div>
            </div>
        </div>

        <nav
            class="flex min-w-[240px] flex-col gap-1 px-2 pb-2 text-sm font-normal max-h-[75dvh] overflow-y-auto border border-base-100 rounded-lg"
        >
            <div class="sticky top-0 bg-neutral py-2 border-b border-base-100 z-10 -mx-2">
                <x-partials.breadcrumbs :currentDirectory="$this->currentDirectory" />
            </div>

            <div
                role="button"
                class="flex items-center w-full p-3 leading-tight transition-all rounded-lg outline-none text-start hover:bg-base-100 active:bg-base-100 focus:bg-base-100 font-bold"
                wire:click="changeDirectory('..')"
                x-intersect:leave="showToolbar = false"
                x-intersect:enter="showToolbar = true"
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

        <div wire:loading class="absolute inset-0 backdrop-blur grid place-content-center rounded-md z-10">
            <x-loading class="size-12 mx-auto block text-primary" />
        </div>
    </div>
</div>
