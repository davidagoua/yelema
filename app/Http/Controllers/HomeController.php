<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Item;
use App\Models\Pack;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('front.home');
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
                'localisation' => json_encode(session()->get('localisation'))
            ]);

            $commande->save();
            session()->flash('success', "Votre demande a été enregistré vous serez contact sous peu");
            $pdf = PDF::loadView('pdf.invoice', compact('commande'));
            return $pdf->download('invoice_yelema.png');

        }

        return view('front.inscription.info_perso');
    }
}
