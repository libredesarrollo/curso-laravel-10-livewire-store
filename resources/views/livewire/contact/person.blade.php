<div>
    <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">

        <x-label>{{ __('Name') }}</x-label>
        <x-input-error for="name" />
        <x-input type="text" wire:model="name" />

        <x-label>{{ __('Surname') }}</x-label>
        <x-input-error for="surname" />
        <x-input type="text" wire:model="surname" />

        <x-label>{{ __('Choices') }}</x-label>
        <x-input-error for="choices" />
        <select wire:model="choices">
            <option value="">Seleccione</option>
            <option value="advert">{{ __('Advert') }}</option>
            <option value="post">{{ __('Post') }}</option>
            <option value="course">{{ __('Course') }}</option>
            <option value="movie">{{ __('Movie') }}</option>
            <option value="other">{{ __('Other') }}</option>
        </select>

        <x-label>{{ __('Other') }}</x-label>
        <x-input-error for="other" />
        <textarea wire:model="other"></textarea>

        <div class="flex mt-5 gap-3">
            <x-secondary-button wire:click="$emit('stepEvent',1)">Atrás</x-secondary-button>
            <x-button type="submit">Enviar</x-button>
        </div>
    </form>
</div>
