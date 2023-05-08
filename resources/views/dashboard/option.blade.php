@extends('base')

@section('title', 'Les options')

@section('content')
    <h1>Les options</h1>

    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nom de l'option">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="col text-end">
                <button class="btn btn-success">Ajouter</button>
            </div>
        </div>
    </form>

    <ol class="list-group">
        @foreach ($options as $opt)
            <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        {{ $opt->nom }}
                    </div>
                    <div class="col text-end">
                        <form action="" method="post">
                            @method("DELETE")
                            @csrf

                            <button class="btn btn-sm btn-danger" name="id" value="{{$opt->id}}">Supprimer</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
@endsection