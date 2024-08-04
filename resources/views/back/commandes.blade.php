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
                <table class="responsive table">
                    <tr>
                        <th>Nom Client</th>
                        <th>Contact Client</th>
                        <th>Email Client</th>
                        <th>Pack</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    @forelse($commandes as $commande)
                        <tr x-show="'{{ $commande->nom }} {{ $commande->prenoms }}'.toLocaleLowerCase().indexOf(q) != -1">
                            <td>{{ $commande->nom }} {{ $commande->prenoms }}</td>
                            <td>{{ $commande->contact }}</td>
                            <td>{{ $commande->email }}</td>
                            <td><b class="text-primary">{{ $commande->pack->name }}</b></td>


                            <td class="d-flex align-items-center">
                                <a class="btn btn-primary btn-sm" href="" hx-confirm="Voulez-vous vraiment supprimer cet article ?">
                                    <span class="fa fa-eye "></span>
                                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="" hx-confirm="Voulez-vous vraiment supprimer cet article ?">
                                    <span class="fa fa-trash text-danger"></span>
                                </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="#" data-toggle="modal" >
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
