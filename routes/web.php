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
    Route::any('/inscription-terminee/{commande}/', 'commande_done')->name('front.inscription.commande_done');
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
            Route::get('/commande-valide', 'commande_valide')->name('commande_valide');
            Route::get('/commande-en-cour', 'commande_pending')->name('commande_pending');
            Route::get('/commande-terminee', 'commande_completed')->name('commande_completed');
            Route::get('/details/{commande}', 'detail')->name('commande_detail');
            Route::get('/validate/{commande}', 'validate_commande')->name('validate_commande');
            Route::post('/avance/{commande}', 'create_avance')->name('create_avance');
        });

        Route::get('/details/{commande}/{status}', function (Request $request, \App\Models\Commande $commande, int $status){
            $commande->status = \App\Models\CommandeState::from($status);
            $commande->save();
            return back()->with('success', 'Commande enregistrée');
        })->name('set_status');
    });


Route::get('/home', function(){
    return view('front.home');
});


Route::get('/nb_commnande-status', function(){
    $q = \App\Models\Commande::query()
        ->selectRaw('count(id) as nb, status')
        ->groupBy('status')
        ->pluck('nb','status')
    ;
    return response()->json($q);
})->name('commandes_by_status');

Route::get('/commande-by-date', [\App\Http\Controllers\Admin\CommandeController::class, 'commandeByDate'])->name('commande_by_date');


Route::get('/send-mail', function(Request $request){
    $commande = \App\Models\Commande::query()->find(13);
    \Illuminate\Support\Facades\Mail::to(['info@bright-event.online'])->send(
        new \App\Mail\CommandeRegisteredMail($commande)
    );
    return redirect('/');
});
