<div>
    <div class="flex">
        <div x-data="{ active: @entangle('step') }" class="flex mx-auto flex-col sm:flex-row">
            <div class="step active" :class="{ 'active': active == 1 }">
                STEP 1
            </div>
            <div class="step" :class="{ 'active': parseInt(active) == 2 }">
                STEP 2
            </div>
            <div class="step" :class="{ 'active': active == 3 }">
                STEP 3
            </div>
        </div>
    </div>

    @if ($step == 1)
        <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">

            <x-label>{{ __('Subject') }}</x-label>
            <x-input-error for="subject" />
            <x-input type="text" wire:model="subject" />

            <x-label>{{ __('Type') }}</x-label>
            <x-input-error for="type" />
            <select wire:model="type">
                <option value="">Seleccione</option>
                <option value="company">{{ __('Company') }}</option>
                <option value="person">{{ __('Person') }}</option>
            </select>

            <x-label>{{ __('Message') }}</x-label>
            <x-input-error for="message" />
            <textarea wire:model="message"></textarea>

            <div class="flex mt-5 gap-3">
                <x-button type="submit">Enviar</x-button>
            </div>
        </form>
    @elseif($step == 2)
        @livewire('contact.company')
    @elseif($step == 2.5)
        @livewire('contact.person')
    @elseif($step == 3)
        @livewire('contact.detail')
        {{-- @elseif($step == 4) --}}
    @else
        FIN
    @endif

</div>
