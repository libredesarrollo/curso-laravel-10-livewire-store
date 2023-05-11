import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

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
