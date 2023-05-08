@extends('base')

@section('title', 'Les options')

@section('content')
    <h1>Les options</h1>

    <ol class="list-group">
        @foreach ($appart as $appart)
            <li class="list-group-item">
                <div class="row">
                    <div class="col">
                        <a href="{{ route('appart.show', ['appart' => $appart->id]) }}">{{ $appart->titre }}</a>
                    </div>
                    <div class="col text-end">
                        <form action="" method="post">
                            @method("DELETE")
                            @csrf

                            <button class="btn btn-sm btn-danger" name="id" value="{{$appart->id}}">Supprimer</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ol>
@endsection