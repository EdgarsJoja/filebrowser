<div>
    <form class="m-0" wire:submit="save">
        <div class="flex flex-col gap-8">
            <input
                type="file"
                wire:model="file"
                class="border border-gray-400 border-dashed p-4 w-full h-32"
            />

            <button
                type="submit"
                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] max-w-fit self-end"
            >
                Upload
            </button>
        </div>
    </form>
</div>
