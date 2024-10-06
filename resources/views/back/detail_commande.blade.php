@extends('back.base')


@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" integrity="sha512-h9FcoyWjHcOcmEVkxOfTLnmZFWIH0iZhZT1H2TbOq55xssQGEJHEaIm+PgoUaZbRvQTNTluNOEfb1ZRy6D3BOw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <section class="section">

        <div class="section-body">

            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title align-items-center">
                                <h2>
                                    <img src="/assets/img/yelema.png" alt="">
                                </h2>
                                <div class="invoice-number">Commande #{{ \Illuminate\Support\Str::padLeft($commande->id ,7, '0') }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Client:</strong><br>
                                        {{ $commande->prenoms }} {{ $commande->nom }}<br>
                                        {{ $commande->contact }}<br>
                                        {{ $commande->email }}<br>

                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Reservation:</strong><br>
                                        {{ $commande->localisation['date'] }} {{ $commande->localisation['time'] }}<br>
                                        {{ $commande->localisation['origine'] }}<br>
                                        {{ $commande->localisation['destination'] }}<br>
                                        {{ $commande->pack->name }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>Parcours:</strong><br>
                                        <b>Origine:</b> {{ $commande->localisation['origine'] }}, {{ $commande->localisation['origin_type_local'] }}, {{ $commande->localisation['origin-nb_piece'] }} pièces<br>
                                        <b>Destination:</b> {{ $commande->localisation['destination'] }}, {{ $commande->localisation['destination_type_local'] }}, {{ $commande->localisation['destination_nb_piece'] }} pièces<br>
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>Date de reservation:</strong><br>
                                        {{ \Carbon\Carbon::make($commande->created_at)->format('D, d M Y') }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">Commande</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tbody><tr>
                                        <th data-width="40" style="width: 40px;">#</th>
                                        <th>Pack</th>
                                        <th class="text-center">Articles</th>
                                        <th class="text-center">Quantité</th>
                                        <th class="text-center">Prix</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td rowspan="$commande->items()->count()">
                                            {{ $commande->pack->name }}
                                        </td>
                                        @foreach($commande->items as $item)
                                        <td class="text-center">1</td>
                                        <td class="text-center">
                                             {{ $item->name}} x {{ $item->quantity }} <br>
                                        </td>
                                        @endforeach
                                        <td class="text-center" rowspan="$commande->items()->count()">
                                            {{ $commande->price }} FCFA
                                        </td>
                                    </tr>

                                    </tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <div class="float-lg-left mb-lg-0 mb-3">
                        @if($commande->status == \App\Models\CommandeState::NEWS->value)
                        <button data-toggle="modal" data-target="#validate-modal" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Valider</button>
                        @elseif($commande->status == \App\Models\CommandeState::VALIDATED->value)
                        @elseif($commande->status == \App\Models\CommandeState::PENDING->value)
                        <button data-toggle="modal" data-target="#modal-avance" class="btn btn-primary btn-icon icon-left"><i class="fas fa-download"></i> Ajouter une avance</button>
                        <a onclick="return confirm('Voulez-vous vraiment executer cette action ?')" href="{{ route('admin.set_status', ['commande'=>$commande, 'status'=>\App\Models\CommandeState::COMPLETED]) }}" class="btn btn-success btn-icon icon-left"><i class="fas fa-check"></i> Terminer</a>
                        @endif
                        <a onclick="return confirm('Voulez-vous vraiment executer cette action ?')" href="{{ route('admin.set_status', ['commande'=>$commande, 'status'=>\App\Models\CommandeState::CANCELED]) }}" class="btn  btn-outline-danger btn-icon icon-left"><i class="fas fa-times"></i>Annuler</a>
                    </div>
                    <a href="{{ route('download_facture', ['commande'=>$commande]) }}" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Imprimer</a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')
<div class="modal fade" id="validate-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-bold"><b>Montant de la facture #{{ \Illuminate\Support\Str::padLeft($commande->id ,7, '0') }}</b></div>
            <div class="modal-body">
                <form action="{{ route('admin.validate_commande', ['commande'=>$commande]) }}" method="GET">
                    <div class="mb-3">
                        <label for="">Montant</label>
                        <input name="price" type="text" required placeholder="Entrez le montant total de la facture" class="form-control">
                    </div>
                    <p class="float-right">
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-avance">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><b>Ajouter une avance</b></div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.create_avance', ['commande'=>$commande]) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="">Montant</label>
                        <input type="text" required pattern="[0-9]+" name="montant" class="form-control">
                    </div>
                    <p class="float-right">
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-body">
                        <div id="map" class=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-locationpicker@0.3.4/src/leaflet-locationpicker.min.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script>
    var map = L.map('map').setView([5.343924, -4.0645722], 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);


</script>
@endpush
@push('style')

    <style>
        #map { height: 550px; }

    </style>
@endpush
