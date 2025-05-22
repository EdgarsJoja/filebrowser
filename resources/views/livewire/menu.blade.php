<div class="flex flex-col sm:flex-row gap-4 sm:items-center">
    <x-modal wire:model="fileUploadModal" class="backdrop-blur" box-class="bg-neutral">
        <livewire:file-upload :currentDirectory="$currentDirectory" />
    </x-modal>
    <x-button label="Upload Files" icon="o-arrow-up-tray" @click="$wire.fileUploadModal = true" class="btn-primary" />

    <x-modal wire:model="createDirectoryModal" class="backdrop-blur" box-class="bg-neutral">
        <livewire:create-folder :currentDirectory="$currentDirectory" />
    </x-modal>
    <x-button label="Create Folder" icon="o-folder-plus" @click="$wire.createDirectoryModal = true" />
</div>
