@extends('back.base')


@section('content')
    <div class="row">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Packs</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#add-pack-modal">Ajouter</button>
                    </div>
                </div>
                <div class="card-body">
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
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Articles</h4>
                    <div class="card-header-action">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#add-item-modal">Ajouter</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="responsive table">
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
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>

    </script>
@endpush
