@slot('header')
    {{ __('CRUD categorias') }}
@endslot
<x-card class="container">

    <x-action-message on="deleted">
        <div class="box-action-message">
            {{ __('Post deleted success') }}
        </div>
    </x-action-message>

    @slot('title')
        Listado
    @endslot

    <a class="btn-secondary mb-3" href="{{ route('d-post-create') }}">Crear</a>

    <table class="table w-full border">
        <thead class="text-left bg-gray-100 ">
            <tr class="border-b">
                <th class="p-2">
                    Título
                </th>
                <th class="p-2">
                    Fecha
                </th>
                <th class="p-2">
                    Descripción
                </th>
                <th class="p-2">
                    Posted
                </th>
                <th class="p-2">
                    Típo
                </th>
                <th class="p-2">
                    Categoría
                </th>
                <th class="p-2">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr class="border-b">
                    <td class="p-2">
                        {{ $p->title }}
                    </td>
                    <td class="p-2">
                        {{ $p->date }}
                    </td>
                    <td class="p-2">
                        {{ $p->description }}
                    </td>
                    <td class="p-2">
                        {{ $p->posted }}
                    </td>
                    <td class="p-2">
                        {{ $p->type }}
                    </td>
                    <td class="p-2">
                        {{ $p->category->title }}
                    </td>
                    <td class="p-2">
                        <x-nav-link href="{{ route('d-post-edit', $p) }}" class="mr-2">Editar</x-nav-link>
                        <x-danger-button {{-- onclick="confirm('Seguro que deseas eliminar el registro seleccionado?') || event.stopImmediatePropagation()" --}}
                            wire:click="seletedPostToDelete({{ $p }})">
                            Eliminar
                        </x-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>

    {{ $posts->links() }}

    <x-confirmation-modal wire:model="confirmingDeletePost">
        <x-slot name="title">
            {{ __('Delete Post') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this post?') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingDeletePost')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="delete()"
                wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</x-card>
