<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Avance;
use App\Models\Commande;
use App\Models\CommandeState;
use App\Models\Item;
use App\Models\Pack;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $item = Item::query();

        $commandes = Commande::query()
            ->selectRaw('count(id) as nb, status')
            ->groupBy('status')
            ->pluck('nb','status')->toArray();




        $somme_avance = Avance::query()->select('montant')->sum('montant');
        $somme_commande = Commande::query()
            ->select('status','price')
            ->where('status','=',CommandeState::VALIDATED)
            ->sum('price');

        return view('back.dashboard', [
           'items' => $item->get(),
            'page_title'=>"Tableau de bord",
            'pack_count'=> Pack::query()->count(),
            'pending'=> $commandes[CommandeState::PENDING->value] ?? 0,
            'newsone'=> $commandes[CommandeState::NEWS->value] ?? 0,
            'validated'=> $commandes[CommandeState::VALIDATED->value] ?? 0,
            'completed'=> $commandes[CommandeState::COMPLETED->value] ?? 0,
            'somme_avance'=>$somme_avance,
            'somme_commande'=>$somme_commande,
            'total_commandes'=>Commande::query()->count()
        ]);
    }

    public function store(Request $request)
    {
        return $this->update($request, new Item());
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
           'name'=>'required'
        ]);

        $item->fill($data)->save();
        session()->flash('success', "Objet enregistré");
        return redirect()->route('admin.settings');
    }

    public function delete(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.settings')->with('success', "Objet supprimé");
    }

    public function toggle_state(Item $item)
    {
        $item->actif = ! $item->actif;
        $item->save();
        return response()->json(['success'=>true]);
    }
}
