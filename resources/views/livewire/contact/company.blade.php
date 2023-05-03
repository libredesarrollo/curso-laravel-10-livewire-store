<div>
    <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">
        <x-label>{{ __('Name') }}</x-label>
        <x-input-error for="name" />
        <x-input type="text" wire:model="name" />

        <x-label>{{ __('Identification') }}</x-label>
        <x-input-error for="identification" />
        <x-input type="text" wire:model="identification" />


        <x-label>{{ __('Email') }}</x-label>
        <x-input-error for="email" />
        <x-input type="email" wire:model="email" />

        <x-label>{{ __('Extra') }}</x-label>
        <x-input-error for="extra" />
        <x-input type="text" wire:model="extra" />


        <x-label>{{ __('Choices') }}</x-label>
        <x-input-error for="choices" />
        <select wire:model="choices">
            <option value="">Seleccione</option>
            <option value="advert">{{ __('advert') }}</option>
            <option value="post">{{ __('Post') }}</option>
            <option value="course">{{ __('Course') }}</option>
            <option value="movie">{{ __('Movie') }}</option>
            <option value="other">{{ __('Other') }}</option>
        </select>
        <div class="flex mt-5 gap-3">
            <x-secondary-button wire:click="$emit('stepEvent',1)">Atrás</x-secondary-button>
            <x-button type="submit">Enviar</x-button>
        </div>
    </form>
</div>
