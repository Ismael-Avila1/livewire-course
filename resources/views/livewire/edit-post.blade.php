<div>
    <a class="btn-green" wire:click="$set('open', true)">
        <i class="fas fa-edit"></i>
    </a>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content">
        </x-slot>

        <x-slot name="footer">
        </x-slot>
    </x-dialog-modal>
</div>
