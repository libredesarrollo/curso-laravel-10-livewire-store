<div>

    <x-action-message on="created">
        {{ __('Created category success') }}
    </x-action-message>

    <x-action-message on="updated">
        {{ __('Updated category success') }}
    </x-action-message>

    <form wire:submit.prevent="submit">

        <x-label for="">Título</x-label>
        <x-input-error for="title" />
        <x-input type="text" wire:model="title" />

        <x-label for="">Texto</x-label>
        <x-input-error for="text" />
        <x-input type="text" wire:model="text" />

        <x-label for="">Imagen</x-label>
        <x-input-error for="image" />
        <x-input type="file" wire:model="image" />

        <x-button type="submit">Enviar</x-button>
    </form>

    @if ($category && $category->image)
        <img class="w-40 my-3" src="{{ $category->getImageUrl() }}" />
    @endif
</div>
