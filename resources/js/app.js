import './bootstrap';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'
import Sortable from 'sortablejs';

import focus from '@alpinejs/focus';

Alpine.plugin(persist)
window.Alpine = Alpine;
window.Sortable = Sortable;

Alpine.plugin(focus);

Alpine.start();

import toast from 'toast-me';
window.toast = toast

const options = {
    position:'bottom'
}

Livewire.on('itemAdd', (post) =>{
    toast("Item agredado exitosamente! "+post.title, options)
})
Livewire.on('itemChange', (post) =>{
    toast("Item modificado exitosamente! "+post.title, options)
})
Livewire.on('itemDelete', () =>{
    toast("Item elimado :(", 'error')
})
