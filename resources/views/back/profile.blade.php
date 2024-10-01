@extends('back.base')

@section('content')
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Informations personnelles</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Changer le mot de passe</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="current_password">Mot de passe actuel</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmer le nouveau mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
