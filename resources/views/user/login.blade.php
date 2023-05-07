@extends('base')

@section('title', 'Connexion')

@section('content')
        <div class="card position-absolute top-50 start-50 translate-middle">
            <div class="card-header text-center">
                Connexion
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div><br>
                    <div class="form-group">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div><br>
                    <div class="form-group">
                        <button class="btn btn-primary w-100">Connexion</button>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('signUp') }}">S'inscrire</a>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
@endsection