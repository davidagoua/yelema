@extends('back.base')


@section('content')
    <div class="">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Packs</h4>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{ route("admin.settings.store_pack") }}" x-data="{ns:[0]}" enctype="multipart/form-data" method="post">
                            <div class="">
                                <div class="d-flex">
                                    @csrf
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for=""><b>Nom du pack</b></label>
                                            <input type="text" required name="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for=""><b>Description</b></label>
                                            <textarea  required name="description" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <b>Spécifications</b>
                                        </div>
                                        <template x-for="(n, index) in ns.length">
                                            <div  class="d-flex mb-3 mx-0 px-0 justify-content-between align-items-center">
                                                <div class="col-6">
                                                    <input required type="text" placeholder="Nom" name="specs[labels][]" class="form-control">
                                                </div>
                                                <div class="col-5">
                                                    <input type="text" placeholder="Valeur" name="specs[values][]" class="form-control">
                                                </div>
                                                <div class="col-1">
                                                    <a href="#" @click="ns = ns.filter((n,i)=> i != index)"><span class="fa fa-times"></span></a>
                                                </div>
                                            </div>
                                        </template>
                                        <div class="mb-3">
                                            <button type="button" class="btn btn-primary btn-sm" @click="ns.push(0)">+ Ajouter</button>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer text-right">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="responsive table">
                        <tr>
                            <th>Nom</th>
                            <th>Actif</th>
                            <th></th>
                        </tr>
                        @forelse($packs as $pack)
                            <tr>
                                <td>{{ $pack->name }}</td>

                                <td class="d-flex">
                                    <a onclick="return confirm('Voulez-vous vraiment executer cette action ?')" href="{{ route('admin.settings.delete_pack', ['pack'=>$pack]) }}" >
                                        <span class="fa fa-trash text-danger"></span>
                                    </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="#" data-toggle="modal" data-target="#edit-pack-{{ $pack->id }}" >
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
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Articles</h4>
                </div>
                <div class="card-body d-flex">
                    <table class="responsive table col-8">
                        <tr>
                            <th>Nom</th>
                            <th>Actif</th>
                            <th></th>
                        </tr>
                        @forelse($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @if($item->actif)
                                        <span class="badge badge-pill badge-success">Actif</span>
                                    @else
                                        <span class="badge badge-pill badge-default">Inactif</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.items.delete', ['item'=>$item]) }}" hx-confirm="Voulez-vous vraiment supprimer cet article ?">
                                        <span class="fa fa-trash text-danger"></span>
                                    </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a class="#" data-toggle="modal" data-target="#edit-item-{{ $item->id }}" >
                                        <span class="fa fa-edit text-default"></span>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade show" tabindex="-1" role="dialog"  id="edit-item-{{ $item->id }}">
                                <div class="modal-dialog"  role="document">
                                    <form action="{{ route("admin.items.update", $item) }}" enctype="multipart/form-data" method="post">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for=""><b>Nom de l'article</b></label>
                                                    <input type="text" value="{{ $item->name ?? '' }}" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer text-right">
                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="3">Aucun article enrégistré</td>
                            </tr>
                        @endforelse
                    </table>
                    <div class="col-4">
                        <form action="{{ route("admin.items.store") }}" enctype="multipart/form-data" method="post">
                            <div class="">
                                <div class="">
                                    @csrf
                                    <div class="mb-3">
                                        <label for=""><b>Nom de l'article</b></label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer text-right">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('modal')
    @foreach($packs as $pack)
        <div class="modal fade" id="edit-pack-{{ $pack->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        Modifier le pack
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.settings.update_pack', ['pack'=>$pack]) }}" x-data="{ns:[0]}" enctype="multipart/form-data" method="post">
                            <div class="">
                                <div class="">
                                    @csrf
                                    <div class="">
                                        <div class="mb-3">
                                            <label for=""><b>Nom du pack</b></label>
                                            <input type="text" value="{{ $pack->name }}" required name="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for=""><b>Description</b></label>
                                            <textarea  required name="description"  rows="5" class="form-control">{{ $pack->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer text-right">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection


@push('scripts')

@endpush
