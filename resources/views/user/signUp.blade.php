@extends('base')

@section('title', 'Inscription')

@section('content')
    <div class="card position-absolute top-50 start-50 translate-middle">
        <div class="card-header text-center">
            Inscription
        </div>
        <div class="card-body">
            <form method="POST" action="">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="nom" value="{{ old('nom') }}">
                            @error('nom')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nom">Prénom</label>
                            <input type="text" class="form-control" name="prenom" value="{{ old('prenom') }}">
                            @error('nom')
                                {{ $prenom }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="telephone">Téléphone</label>
                            <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}">
                            @error('telephone')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password_confirmation">Confirmer le mot de passe</label>
                            <input type="password" class="form-control" name="password_confirmation">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div><br>
                <div class="form-group text-center">
                    <button class="btn btn-primary">Connexion</button>
                </div>
            </form>
        </div>
        @if (session('error'))
            <div class="card-footer text-muted">
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            </div>
        @endif
  </div>
@endsection