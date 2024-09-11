<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOOKS</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/font-awesome.min.css') }}">
    {{-- <style>
        $color-primary-white: rgb(240, 240, 240);

        main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 50px;
        font-family: 'Roboto', sans-serif;
        }

        .card-content {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .card {
        width: 24rem;
        height: 36rem;
        margin-bottom: 40px;
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        position: relative;
        /* color: $color-primary-white; */
        /* box-shadow: 0 10px 30px 5px rgba(0, 0, 0, 0.2); */
        box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;

        img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0.9;
            transition: opacity .2s ease-out;
        }

        h2 {
            position: absolute;
            inset: auto auto 30px 30px;
            margin: 0;
            opacity: 0;
            transition: inset .3s .3s ease-out;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            color: #BF2330;
        }

        p, a {
            position: absolute;
            opacity: 0;
            max-width: 80%;
            transition: opacity .3s ease-out;
        }

        p {
            inset: auto auto 80px 30px;
        }

        a {
            inset: auto auto 40px 30px;
            color: inherit;
            text-decoration: none;
        }

        &:hover h2 {
            opacity: 1;
            inset: auto auto 220px 30px;
            transition: inset .3s ease-out;
        }

        &:hover p, &:hover a {
            opacity: 1;
            transition: opacity .5s .1s ease-in;
        }

        &:hover img {
            transition: opacity .3s ease-in;
            opacity: .1;
        }

        }

        .material-symbols-outlined {
        vertical-align: middle;
        }

        .card-content a:hover {
            text-decoration: underline;
        }
    </style> --}}
    <style>
    h1 {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-weight: 600;
        text-transform: uppercase;
        color: #BF2330;
    }
    svg {
        display: none; !important
    }
    </style>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success w-100 p-3 text-center">
            {{ session('success') }}
        </div>
    @endif
    @include('layouts.nav')
    @php
        try {
            print '<h1 class="text-center mb-5 border p-2"><span style="color: black">Books by</span> '.$selectedAuteur->prenom.' '.$selectedAuteur->nom.'</h1>';
        } catch (\Throwable $th) {
            //throw $th;
        }
    @endphp
    <main class="d-flex align-items-center justify-content-around flex-wrap w-100">
        @forelse ($livres as $livre)
            <div class = "card">
            <img src="{{ asset($livre->image) }}" alt="">
            <div class="card-content">
                <h2 class="p-2 text-center">
                    &ldquo; {{ $livre->titre }} &rdquo; <br/><span style="color: black; font-weight: normal; font-size: 24px">by</span> <span style="font-weight: normal; font-size: 24px">{{ $livre->auteur->prenom.' '.$livre->auteur->nom }}</span>
                </h2>
                <p>
                    {{ $livre->description }}
                </p>
                <a href="{{ route('livres.show', $livre->id) }}" class="button" style="color: #BF2330">
                    Find out more <i class="fas arrow material-symbols-outlined" aria-hidden="true"></i>
                </a>
            </div>
            </div>
        @empty
            <div class="text-center alert alert-danger w-100">No books yet</div>
        @endforelse
      </main>
      {{-- <div style="width: 100%; height: 50px;" class="text-center">
        {{ $livres->links() }}
      </div> --}}
    {{-- <div class="d-flex align-items-center justify-content-around flex-wrap w-100">
        @forelse ($livres as $livre)
            <div class="card d-flex align-items-center justify-content-center flex-column">
                <img class="card-img-top" style="width: 150px; height: 300px" src="{{ asset($livre->image) }}" alt="Book Cover">
                <div class="card-body">
                    <h5>{{ $livre->titre }}</h5>
                    <div>Auteur : {{ $livre->auteur->prenom.' '.$livre->auteur->nom }}</div>
                    <div>ISBN : {{ $livre->isbn }}</div>
                    <div>En stock : {{ $livre->quantite }}</div>
                    <div>Prix : <span style="color: red">{{ $livre->prix }}</span></div>
                    <a href="{{ route('livres.show', $livre->id) }}">Consulter sur le site</a>
                </div>
            </div>
        @empty
            <div class="text-center alert alert-danger w-100">No books yet</div>
        @endforelse
    </div> --}}
</body>
</html>
