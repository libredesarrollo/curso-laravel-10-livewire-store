<div class="container">
<x-action-message on="created">
    {{ __('Created category success') }}
</x-action-message>

<x-action-message on="updated">
    {{ __('Updated category success') }}
</x-action-message>

<x-form-section submit="submit">

    @slot('title')
        {{ __('Categories') }}
    @endslot

    @slot('description')
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate eaque, iure modi ipsa consequatur, veritatis
        debitis accusantium quasi consequuntur velit earum nam nisi dolores temporibus animi placeat, alias cumque
        assumenda.
    @endslot

    @slot('form')
        <div class="col-span-6 sm:col-span-4">
            <x-label for="">Título</x-label>
            <x-input-error for="title" />
            <x-input class="block w-full" type="text" wire:model="title" />
        </div>


        <div class="col-span-6 sm:col-span-4">
            <x-label for="">Texto</x-label>
            <x-input-error for="text" />
            <x-input class="block w-full" type="text" wire:model="text" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="">Imagen</x-label>
            <x-input-error for="image" />
            <x-input type="file" wire:model="image" />

            @if ($category && $category->image)
                <img class="w-40 my-3" src="{{ $category->getImageUrl() }}" />
            @endif
        </div>
    @endslot

    @slot('actions')
        <x-button type="submit">Enviar</x-button>
    @endslot

</x-form-section>
