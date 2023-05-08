@extends('base')

@section('title', $appart->titre)

@section('content')
    <div class="row">
        <div class="col-8">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @php
                        $i = 0;
                    @endphp
                    @if (!empty($appart->images->first()))
                        @foreach ($appart->images as $img)
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" aria-label="Slide {{$i++}}"></button>
                        @endforeach
                    @endif
                </div>
                <div class="carousel-inner">
                    @if (!empty($appart->images->first()))
                        @foreach ($appart->images as $img)
                            <div class="carousel-item active">
                                <img src="{{$img->getUrl()}}" class="d-block w-100" alt="Lien incorrect">
                            </div>
                        @endforeach
                    @else
                        <img src="{{Storage::disk('public')->url('appart/default.jpg')}}" class="d-block w-100" alt="Lien incorrect">
                    @endif
                </div>
                @if (!empty($appart->images->first()))
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                @endif
              </div>
        </div>
        <div class="col-4">
            <h1>{{ $appart->titre }}</h1>
            <h2>{{ $appart->nbPiece }} pièces - {{ $appart->surface }}m²</h2>
            <h1><strong>{{$appart->prix}}</strong>€</h1>
            <hr>
            <h3>Intéresser par ce bien?</h3>
            @auth
                <form action="" method="post">
                    @csrf
                    <div class="mb-3">
                        <textarea name="message" id="message" class="w-100" placeholder="Ecrivez votre message ici!" rows="3"></textarea>
                    </div>
                </form>
            @endauth
            @guest
                Veuillez vous connecter pour envoyer un message.
            @endguest
        </div>
        <div>
            <hr>
            {{ $appart->description }}
        </div>

        <div class="col-8">
            <h1>Caractéristiques</h1>
            <table class="table table-striped table-hover">
                <tr>
                    <td>Surface habitable</td>
                    <td>{{ $appart->surface }}</td>
                </tr>
                <tr>
                    <td>Nombre de piece</td>
                    <td>{{ $appart->nbPiece }}</td>
                </tr>
                <tr>
                    <td>Nombre de chambre</td>
                    <td>{{ $appart->nbChambre }}</td>
                </tr>
                <tr>
                    <td>Etage</td>
                    <td>{{ $appart->numEtage }}</td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            <h1>Spécificité</h1>
            <ol class="list-group">
                @foreach ($appart->options as $option)
                    <li class="list-group-item">{{ $option->nom }}</li>
                @endforeach
            </ol>
        </div>
    </div>
@endsection