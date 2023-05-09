@extends('base')

@section('title', 'Mes biens')

@section('content')
<h1>Mes biens</h1>
<div>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>

<ol class="list-group">
    @foreach ($apparts as $app)
        <li class="list-group-item">
            <div class="row">
                <div class="col">
                    <a href="{{ route('appart.show', ['appart' => $app->id]) }}">{{ $app->titre }}</a>
                </div>
                <div class="col text-end">
                    <form action="" method="post">
                        @method("DELETE")
                        @csrf

                        <button class="btn btn-sm btn-danger" name="id" value="{{$app->id}}">Supprimer</button>
                    </form>
                </div>
            </div>
        </li>
    @endforeach
@endsection