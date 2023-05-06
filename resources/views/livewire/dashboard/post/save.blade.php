
@slot('header')
    {{ __('CRUD posts') }}
@endslot

<div class="container">

    <x-action-message on="created">
        <div class="box-action-message">
            {{ __('Created post success') }}
        </div>
    </x-action-message>

    <x-action-message on="updated">
        <div class="box-action-message">
            {{ __('Updated post success') }}
        </div>
    </x-action-message>

    <x-form-section submit="submit">

        @slot('title')
            {{ __('Posts') }}
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
                <x-label for="">Fecha</x-label>
                <x-input-error for="date" />
                <x-input class="block w-full" type="date" wire:model="date" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <div wire:ignore>
                    <div id="ckcontent">
                        {!! $text !!}
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label for="">Contenido</x-label>
                <x-input-error for="text" />

                <textarea class="block w-full" wire:model="text"></textarea>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="">Descripción</x-label>
                <x-input-error for="description" />

                <textarea class="block w-full" wire:model="description"></textarea>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="">Posted</x-label>
                <x-input-error for="posted" />

                <select class="block w-full" wire:model="posted">
                    <option value=""></option>
                    <option value="not">No</option>
                    <option value="yes">Si</option>
                </select>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="">Típo</x-label>
                <x-input-error for="type" />

                <select class="block w-full" wire:model="type">
                    <option value=""></option>
                    <option value="adverd">advert</option>
                    <option value="post">post</option>
                    <option value="course">course</option>
                    <option value="movie">movie</option>
                </select>
            </div>
            <div class="col-span-6 sm:col-span-4">
                <x-label for="">Categorías</x-label>
                <x-input-error for="category_id" />

                <select class="block w-full" wire:model="category_id">
                    <option value=""></option>
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}">{{ $c->title }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-span-6 sm:col-span-4">
                <x-label for="">Imagen</x-label>
                <x-input-error for="image" />
                <x-input type="file" wire:model="image" />

                @if ($post && $post->image)
                    <img class="w-40 my-3" src="{{ $post->getImageUrl() }}" />
                @endif
            </div>

        @endslot

        @slot('actions')
            <x-button type="submit">Enviar</x-button>
        @endslot

    </x-form-section>
</div>