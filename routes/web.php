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



Route::controller(App\Http\Controllers\HomeController::class)->group(function(){
    Route::get('/', 'index')->name('front.index');
    Route::any('/inscription-localisation', 'inscription_localisation')->name('front.inscription.localisation');
    Route::any('/inscription-biens', 'setup_bien')->name('front.inscription.setup_bien');
    Route::any('/inscription-packs', 'pack_picking')->name('front.inscription.pack_picking');
    Route::any('/inscription-informations', 'info_perso')->name('front.inscription.info_perso');
});

Route::get('/admin', [\App\Http\Controllers\Admin\ItemController::class, 'index'])->middleware(['auth']);

Route::get("/sse", [App\Http\Controllers\HomeController::class, 'stream_sse']);

Route::any('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])
    ->middleware(['auth'])
    ->name('logout');

Route::prefix('/admin')
    ->middleware(['auth'])
    ->namespace('App\\Http\\Controllers\Admin\\')
    ->name('admin.')
    ->group(function(){

        Route::controller(ItemController::class)
            ->prefix('/items')
            ->name('items.')
            ->group(function(){
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('/{item}/delete', 'delete')->name('delete');
                Route::get('/{item}/toggle-state', 'toggle_state')->name('toggle-state');
                Route::post('/{item}/update', 'update')->name('update');
            })->middleware(['auth']);

        Route::controller(\App\Http\Controllers\Admin\SettingController::class)->group(function(){
            Route::get("/settings", 'index')->name('settings');
            Route::post("/settings/pack", 'store_pack')->name('settings.store_pack');
        });

        Route::controller(\App\Http\Controllers\Admin\CommandeController::class)->group(function(){
            Route::get('/', 'index')->name('commandes');
        });
    });


Route::get('/home', function(){
    return view('front.home');
});
