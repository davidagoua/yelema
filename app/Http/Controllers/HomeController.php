<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandeItem;
use App\Models\CommandeState;
use App\Models\Item;
use App\Models\Pack;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('front.landing');
    }

    public function about(Request $request)
    {
        return view('front.about');
    }

    public function inscription_localisation(Request $request)
    {
        if($request->isMethod('post')){
            session()->put('localisation', $request->post());
            return redirect()->route('front.inscription.setup_bien');
        }
        return view('front.inscription.localisation');
    }

    public function setup_bien(Request $request)
    {
        $items = Item::query()->whereActif(true);
        if($request->isMethod('post')){
            session()->put('biens', $request->input());
            return redirect()->route('front.inscription.pack_picking');
        }
        return view('front.inscription.setup_bien', ['items'=> $items->get()] );
    }

    public function stream_sse()
    {
        $response = new StreamedResponse(function(){
            while (true){
                $data = json_encode(['date'=>now()]);
                echo "date: $data\n\n";
                ob_flush();
                flush();
                sleep(2);
            }
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cache-Control', 'no-cache');
        $response->headers->set('Connexion', 'keep-alive');

        return $response;
    }

    public function pack_picking(Request $request)
    {
        $packs = Pack::query();

        if($request->has('pack')){
            session()->put('pack', $request->input('pack'));
            return redirect()->route('front.inscription.info_perso');
        }

        return view('front.inscription.pack_picking', [
           'packs'=> $packs->get()
        ]);
    }

    public function info_perso(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->validate([
               'nom'=>'required',
               'prenoms'=>'required' ,
                'email'=>'required|email',
                'contact'=>'required'
            ]);
            $commande = new Commande([
                'nom'=>$data['nom'],
                'prenoms'=>$data['prenoms'],
                'email'=>$data['email'],
                'contact'=>$data['contact'],
                'pack_id'=> (int) $request->input('pack'),
                'biens' => json_encode(session()->get('biens')),
                'localisation' => session()->get('localisation'),
                'status'=> CommandeState::NEWS
            ]);
            $biens = collect(session()->get('biens'))->forget(['_token','comment']);

            $commande->save();

            $biens->each(function($quantity, $item_id) use($commande) {
                CommandeItem::create([
                    'command_id'=>$commande->id,
                    'item_id'=>$item_id,
                    'quantity'=> $quantity
                ]);
            });

            \Illuminate\Support\Facades\Mail::to([$commande->email])->send(
                new \App\Mail\CommandeRegisteredMail($commande)
            );
            session()->flash('success', "Votre demande a été enregistré vous serez contact sous peu");
            session()->flash('get_pdf', true);
            session()->flash('commande_id', $commande->id);
            return redirect()->route('front.index');
        }

        return view('front.inscription.info_perso');
    }


    public function download_facture(Request $request, Commande $commande)
    {
        $pdf = PDF::loadView('pdf.invoice', compact('commande'));
        session()->flash('success', "Votre demande a été enregistré vous serez contact sous peu");
        return $pdf->download('facture_yelema.pdf');
    }


}
