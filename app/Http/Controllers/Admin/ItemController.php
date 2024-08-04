<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Pack;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $item = Item::query();

        return view('back.dashboard', [
           'items' => $item->get(),
            'page_title'=>"Tableau de bord",
            'pack_count'=> Pack::query()->count()
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
