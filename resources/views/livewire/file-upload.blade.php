<div
    x-data="{ uploading: false, progress: 0 }"
    x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="uploading = false"
    x-on:livewire-upload-cancel="uploading = false"
    x-on:livewire-upload-error="uploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
    class="relative"
>
    <x-form wire:submit="save" no-separator>
        <x-file wire:model="file" label="File" />

        <x-slot:actions>
            <x-button label="Upload" type="submit" class="btn-primary" ::disabled="uploading" spinner="save" />
        </x-slot:actions>
    </x-form>
</div>
