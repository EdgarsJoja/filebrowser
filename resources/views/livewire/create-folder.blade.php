<div>
    <x-form wire:submit="save" no-separator>
        <x-input label="Name" icon="o-folder" wire:model="newDirectoryName" />

        <x-slot:actions>
            <x-button label="Create" type="submit" class="btn-primary" />
        </x-slot:actions>
    </x-form>
</div>
