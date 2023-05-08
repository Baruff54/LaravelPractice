@extends('base')

@section('title', 'Création d\'un bien')

@section('content')
<div class="card position-absolute top-50 start-50 translate-middle">
    <div class="card-header text-center">
        Inscription
    </div>
    <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" name="titre" value="{{ old('titre') }}">
                        @error('titre')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="surface">Surface</label>
                        <input type="text" class="form-control" name="surface" value="{{ old('surface') }}">
                        @error('surface')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="nbPiece">Nombre de pièces</label>
                        <input type="text" class="form-control" name="nbPiece" value="{{ old('nbPiece') }}">
                        @error('nbPiece')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="nbChambre">Nombre de chambre</label>
                        <input type="text" class="form-control" name="nbChambre" value="{{ old('nbChambre') }}">
                        @error('nbChambre')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="numEtage">Numéro de l'étage</label>
                        <input type="text" class="form-control" name="numEtage" value="{{ old('numEtage') }}">
                        @error('numEtage')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="prix">Prix</label>
                        <input type="text" class="form-control" name="prix" value="{{ old('prix') }}">
                        @error('prix')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" class="form-control" name="adresse" value="{{ old('adresse') }}">
                        @error('adresse')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="cp">Code postale</label>
                        <input type="text" class="form-control" name="cp" value="{{ old('cp') }}">
                        @error('cp')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="ville">Ville</label>
                        <input type="text" class="form-control" name="ville" value="{{ old('ville') }}">
                        @error('ville')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image"/>
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="options">Options</label>
                        <select name="options" id="options" class="form-control" multiple>
                            @foreach ($options as $option)
                                <option value="{{$option->id}}">{{$option->nom}}</option>
                            @endforeach
                        </select>
                        @error('options')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div><br>
            <div class="form-group text-center">
                <button class="btn btn-primary">Ajouter</button>
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