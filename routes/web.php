<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');


    // CRUDs


    Route::group(['prefix' => 'category'],function () {
        Route::get('/', App\Http\Livewire\Dashboard\Category\Index::class)->name("d-category-index");        // listado
        Route::get('/create', App\Http\Livewire\Dashboard\Category\Save::class)->name("d-category-create");  // crear
        Route::get('/edit/{id}', App\Http\Livewire\Dashboard\Category\Save::class)->name("d-category-edit");// edit
    });


    Route::group(['prefix' => 'tag'],function () {
        Route::get('/', App\Http\Livewire\Dashboard\Tag\Index::class)->name("d-tag-index");        // listado
        Route::get('/create', App\Http\Livewire\Dashboard\Tag\Save::class)->name("d-tag-create");  // crear
        Route::get('/edit/{id}', App\Http\Livewire\Dashboard\Tag\Save::class)->name("d-tag-edit");// edit
    });


    Route::group(['prefix' => 'post'],function () {
        Route::get('/', App\Http\Livewire\Dashboard\Post\Index::class)->name("d-post-index");        // listado
        Route::get('/create', App\Http\Livewire\Dashboard\Post\Save::class)->name("d-post-create");  // crear
        Route::get('/edit/{id}', App\Http\Livewire\Dashboard\Post\Save::class)->name("d-post-edit");// edit
    });
});
