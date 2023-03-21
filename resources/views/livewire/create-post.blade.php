<div>
    <x-danger-button wire:click="$set('open', true)">
        Crear nuevo Post
    </x-danger-button>


    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo post
        </x-slot>

        <x-slot name="content">

            <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen cargando...</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}">
            @endif

            <div class="mb-4">
                <x-label value="Título del post" />
                <x-input type="text" class="w-full" wire:model="title" />

                <x-input-error for="title" />
            </div>

            <div class="mb-4">
                <x-label value="Contenido del post" />

                <textarea class="form-control w-full" rows="6" wire:model="content"></textarea>

                <x-input-error for="content" />
            </div>

            <div>
                <input type="file" wire:model="image">
                <x-input-error for="image"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

        <x-danger-button wire:click="save" wire:loading.attr="disable" wire:target="save, image" class="disable:opacity-25">
            Crear Post
        </x-danger-button>
        </x-slot>

    </x-dialog-modal>
</div>
