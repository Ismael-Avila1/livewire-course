<div>
    <a class="btn-green" wire:click="$set('open', true)">
        <i class="fas fa-edit"></i>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar el Post
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Título del post"/>
                <x-input type="text " class="w-full" wire:model="post.title"/>
            </div>

            <div>
                <x-label value="Contenido del post"/>
                <textarea rows="6" class="form-control w-full" wire:model="post.content"></textarea>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

        <x-danger-button wire:click="save">
            Actualizar Post
        </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
