<div>
    <a class="btn-green" wire:click="$set('open', true)">
        <i class="fas fa-edit"></i>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar el Post
        </x-slot>

        <x-slot name="content">
            <div wire:loading wire:target="image" class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Imagen cargando...</strong>
                <span class="block sm:inline">Espere un momento hasta que la imagen se haya procesado.</span>
            </div>

            @if ($image)
                <img class="mb-4" src="{{ $image->temporaryUrl() }}">
            @else
                <img src="{{ Storage::url($post->image) }}" alt="">
            @endif

            <div class="mb-4">
                <x-label value="Título del post"/>
                <x-input type="text " class="w-full" wire:model="post.title"/>
            </div>

            <div>
                <x-label value="Contenido del post"/>
                <textarea rows="6" class="form-control w-full" wire:model="post.content"></textarea>
            </div>

            <div>
                <input type="file" wire:model="image" id="{{ $identifier }}">
                <x-input-error for="image"/>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-secondary-button>

        <x-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25">
            Actualizar Post
        </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
