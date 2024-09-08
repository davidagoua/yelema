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
                            <th>Contact</th>
                            <th>Pack</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        @forelse($commandes as $commande)
                            <tr x-show="'{{ $commande->nom }} {{ $commande->prenoms }}'.toLocaleLowerCase().indexOf(q) != -1">
                                <td>
                                    <a href="{{ route('admin.commande_detail', ['commande'=>$commande]) }}">#{{ \Illuminate\Support\Str::padLeft($commande->id, 7, '0') }}</a>
                                </td>
                                <td>{{ $commande->nom }} {{ $commande->prenoms }}</td>
                                <td>{{ $commande->contact }}</td>
                                <td><b class="">{{ $commande->pack->name }}</b></td>
                                <td><b class="text-primary">{{ $commande->price }} FCFA</b></td>


                                <td class="d-flex align-items-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.commande_detail', ['commande'=>$commande]) }}" >
                                        <span class="fa fa-eye "></span>
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="" hx-confirm="Voulez-vous vraiment supprimer cet article ?">
                                        <span class="fa fa-trash text-danger"></span>
                                    </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="#" data-target="#modal-avance-{{ $commande->id }}" title="Ajouter une avance" data-toggle="modal" >
                                        <span class="fa fa-download text-default"></span>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-avance-{{ $commande->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header"><b>Ajouter une avance</b></div>
                                        <div class="modal-body">
                                            <form action="{{ route('admin.create_avance', ['commande'=>$commande]) }}">
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
                        @empty
                            <tr>
                                <td colspan="3">Aucune commande enrégistré</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('modal')


@endsection
