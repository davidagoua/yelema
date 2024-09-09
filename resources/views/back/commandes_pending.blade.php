@extends('back.base')


@section('content')
    <div class="row" x-data="{q:''}">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <input x-model="q" type="text" class="form-control w-25 " placeholder="Rechercher...">
                    <div class="flex-grow-1"></div>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#add-pack-modal">
                            <span class="fa fa-download"></span>
                            Exporter
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="responsive table-responsive table-invoice table">
                        <tr>
                            <th>N°</th>
                            <th>Nom </th>
                            <th>Pack</th>
                            <th>Total</th>
                            <th>Avance</th>
                            <th></th>
                        </tr>
                        @forelse($commandes as $commande)
                            <tr x-show="'{{ $commande->nom }} {{ $commande->prenoms }}'.toLocaleLowerCase().indexOf(q) != -1">
                                <td>
                                    <a href="{{ route('admin.commande_detail', ['commande'=>$commande]) }}">#{{ \Illuminate\Support\Str::padLeft($commande->id, 7, '0') }}</a>
                                </td>
                                <td>{{ $commande->nom }} {{ $commande->prenoms }}</td>
                                <td><b class="">{{ $commande->pack->name }}</b></td>
                                <td>{{ $commande->price }} fcaf</td>
                                <td><b class="text-primary">{{ $commande->avances()->sum('montant') }} fcfa</b></td>


                                <td class="d-flex align-items-center">
                                    <a class="btn btn-primary btn-sm" href="" hx-confirm="Voulez-vous vraiment supprimer cet article ?">
                                        <span class="fa fa-eye "></span>
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="" class="btn btn-primary btn-sm" hx-confirm="Voulez-vous vraiment supprimer cet article ?">
                                        <span class="fa fa-trash"></span>
                                    </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" >
                                        <span class="fa fa-edit text-default"></span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Aucun article enrégistré</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
