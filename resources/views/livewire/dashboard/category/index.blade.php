<div>
    <x-action-message on="deleted">
        {{ __("Category delete success") }}
    </x-action-message>
    
    @slot('header')
        {{ __('CRUD categorias') }}
    @endslot
    
    <x-card class="container">
        @slot('title')
            Listado
        @endslot

        <a class="btn-secondary mb-3" href="{{ route('d-category-create') }}">Crear</a>

        <table class="table w-full border">
            <thead class="text-left bg-gray-100 ">
                <tr class="border-b">
                    <th class="p-2">
                        Título
                    </th>
                    <th class="p-2">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $c)
                    <tr class="border-b">
                        <td class="p-2">
                            {{ $c->title }}
                        </td>
                        <td class="p-2">
                            <a href="{{ route('d-category-edit', $c) }}" class="mr-2">Editar</a>
                            <x-danger-button wire:click="seletedCategoryToDelete({{ $c }})">
                                Eliminar
                             </x-danger-button>                         
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>
    <br>
    {{ $categories->links() }}
    
    
    <x-confirmation-modal wire:model="confirmingDeleteCategory">
        <x-slot name="title">
            {{ __('Delete Category') }}
        </x-slot>
    
    
        <x-slot name="content">
            {{ __('Are you sure you want to delete this category?') }}
        </x-slot>
    
    
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingDeleteCategory')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
    
    
            <x-danger-button class="ml-3" wire:click="delete()"
                wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
