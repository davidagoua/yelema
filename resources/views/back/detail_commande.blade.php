@extends('back.base')


@section('content')
    <section class="section">


        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2>Invoice</h2>
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
                                        <strong>Local:</strong><br>
                                        <b>Origine:</b> {{ $commande->localisation['origin_type_local'] }}, {{ $commande->localisation['origin-nb_piece'] }} pièces<br>
                                        <b>Destination:</b> {{ $commande->localisation['destination_type_local'] }}, {{ $commande->localisation['destination_nb_piece'] }} pièces<br>
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
                            <div class="section-title">Articles</div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tbody><tr>
                                        <th data-width="40" style="width: 40px;">#</th>
                                        <th>Nom</th>
                                        <th class="text-center">Quantité</th>
                                        <th class="text-center">Prix</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            {{ $commande->pack->name }}
                                        </td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">
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
                        <button data-toggle="modal" data-target="#validate-modal" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Valider</button>
                        <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Annuler</button>
                    </div>
                    <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Imprimer</button>
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
@endsection
