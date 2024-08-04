<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Pack;
use App\Models\Spec;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $packs = Pack::query();
        $items = Item::query();

        return view('back.settings',[
            'packs'=> $packs->get(),
            'page_title'=>"Paramètres",
            'items'=>$items->get()
        ]);
    }

    public function store_pack(Request $request)
    {
        return $this->update_pack($request, new Pack());
    }

    public function delete_packs(Pack $pack)
    {
        $pack->delete();
        return redirect()->route('admin.settings')->with('success', "Packs supprimer");
    }

    public function update_pack(Request $request, Pack $pack)
    {
        $data = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'specs'=>'array',
            'specs.*.labels'=>'array',
            'specs.*.values'=>'array'
        ]);
        $pack->fill($request->only(['name','description']))->save();
        $specs = [];
        //dd($request->input());
        if($request->has('specs')){
            for ($i=0;$i< count($request->input('specs')); $i++){
                $specs[] = new Spec([
                    'label' => $request->input('specs')['labels'][$i],
                    'value' => $request->input('specs')['values'][$i],
                ]);
            }
        }


        $pack->specs()->saveMany($specs);
        $pack->save();

        return redirect()->route('admin.settings')->with('success',"Pack ajouté");
    }
}
