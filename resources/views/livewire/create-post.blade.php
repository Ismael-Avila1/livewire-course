<div>
    <x-danger-button wire:click="$set('open', true)">
        Crear nuevo Post
    </x-danger-button>


    <x-dialog-modal wire:model="open">

        <x-slot name="title">
            Crear nuevo post
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Título del post" />
                <x-input type="text" class="w-full" />
            </div>

            <div class="mb-4">
                <x-label value="Contenido del post" />
                
                <textarea class="form-control w-full" rows="6"></textarea>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

        <x-danger-button>
            Crear Post
        </x-danger-button>
        </x-slot>

    </x-dialog-modal>
</div>
