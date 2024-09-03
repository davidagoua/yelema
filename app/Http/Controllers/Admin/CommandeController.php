<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index(Request $request)
    {
        $commandes = Commande::query();

        return view('back.commandes', [
            'commandes'=> $commandes->get(),
            'page_title'=>'Commandes'
        ]);
    }

    public function detail(Request $request, Commande $commande)
    {
        return view('back.detail_commande', [
           'commande'=> $commande,
            'page_title'=> 'Details commande #'.\Illuminate\Support\Str::padLeft($commande->id, 7, '0')
        ]);
    }
}
