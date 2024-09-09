<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Avance;
use App\Models\Commande;
use App\Models\CommandeState;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index(Request $request)
    {
        $commandes = Commande::query()->where('status', '=', CommandeState::NEWS);

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

    public function validate_commande(Request $request, Commande $commande)
    {
        $commande->price = $request->input('price');
        $commande->status = CommandeState::VALIDATED;
        $commande->save();
        return back()->with('success', "Commande Validée");
    }

    public function commande_valide(Request $request)
    {
        $commandes = Commande::query()->where('status', '=', CommandeState::VALIDATED);

        return view('back.commandes_valide', [
            'commandes'=> $commandes->get(),
            'page_title'=>'Commandes'
        ]);
    }

    public function commande_pending(Request $request)
    {
        $commandes = Commande::query()->where('status', '=', CommandeState::PENDING);

        return view('back.commandes_pending', [
            'commandes'=> $commandes->get(),
            'page_title'=>'Commandes'
        ]);
    }

    public function commande_completed(Request $request)
    {
        $commandes = Commande::query()->where('status', '=', CommandeState::COMPLETED);

        return view('back.commandes_completed', [
            'commandes'=> $commandes->get(),
            'page_title'=>'Commandes'
        ]);
    }

    public function create_avance(Request $request, Commande $commande)
    {
        $montant = $request->input('montant');

        $avance = Avance::create([
            'montant'=>$montant,
            'commande_id'=>$commande->id
        ]);
        if($commande->status == CommandeState::VALIDATED->value){
            $commande->status = CommandeState::PENDING;
            $commande->save();
        }

        return back()->with('success', 'Avance enrégistré');
    }

    public function commandeByDate(Request $request)
    {
        $commandes = Commande::query()
            ->where('status', '=', CommandeState::VALIDATED)
            ->get()
            ->map(function($commande){
                return [
                    'color'=>'#3788d8',
                    'id'=>$commande->id,
                    'start'=>$commande->localisation['date'],
                    'end'=>$commande->localisation['date'],
                    'title'=>$commande->pack->name
                ];
            });

        return response()->json($commandes);
    }

}
