@extends('base')

@section('title', 'Liste des biens')

@section('content')
    <h1 class="text-center">Listes des biens</h1>
    <div class="text-end">
        <a href="{{ route('appart.create') }}" class="btn btn-primary">Créer mon annonce</a>
    </div><br>
    <div class="row">
        @foreach ($apparts as $appart)
            <div class="col-3">
                <div class="card">
                    @if (!empty($appart->images->first()))
                        <img src="{{$appart->images->first()->getUrl()}}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Lien inaccessible">
                    @else
                        <img src="{{Storage::disk('public')->url('appart/default.jpg')}}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="Lien inaccessible">
                    @endif
                    <div class="card-body">
                      <h5 class="card-title">{{ $appart->titre }}</h5>
                      <div class="card-text">{{ $appart->nbPiece }} pièces - {{ $appart->surface }}m²</div>
                      <div class=""><strong>{{$appart->prix}}</strong>€</div>
                      <p class="">{{$appart->cp}} - {{$appart->ville}}</p>
                      <a href="{{ route('appart.show', ['appart' => $appart->id]) }}" class="btn btn-outline-primary w-100">Consulter</a>
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
@endsection