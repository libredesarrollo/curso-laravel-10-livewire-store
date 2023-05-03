<div>
    <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">
        <x-label>{{ __('Extra') }}</x-label>
        <x-input-error for="extra" />
        <textarea wire:model="extra"></textarea>

        <div class="flex mt-5 gap-3">
            <x-secondary-button wire:click="$emit('stepEvent',2)">Atrás</x-secondary-button>
            <x-button type="submit">Enviar</x-button>
        </div>
    </form>
</div>
