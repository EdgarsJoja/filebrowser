<div>
    <x-form wire:submit="save" no-separator>
        <x-input label="Folder name" icon="o-folder" wire:model="newDirectoryName" class="bg-neutral" />

        <x-slot:actions>
            <x-button label="Create" type="submit" class="btn-primary" spinner="save" />
        </x-slot:actions>
    </x-form>
</div>
