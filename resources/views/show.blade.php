<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Card</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('jquery/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <style>
        h1 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            color: #BF2330;
        }
        .author:hover {
            color: #BF2330;
            /* text-decoration: none; */
        }
    </style>
</head>
<body>
    @include('layouts.nav')
    <div class="d-flex align-items-center justify-content-center p-5">
        <img style="width: 500px; height: 500px; margin-right: 100px; box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;" src="{{ asset($livre->image) }}" alt="Article Image">
        {{-- <img src="/storage/app/{{ $article['image'] }}" alt="Article Image"> --}}
        <div class="mt-5 w-100">
            <h1 class="text-center mb-5"> {{ $livre->titre }} </h1>
            <table style="width: 100%" class="table table-light" style="margin-top: 100px;">
                <tr>
                    <th>ISBN</th>
                    <td>{{ $livre->isbn }}</td>
                </tr>
                <tr>
                    <th>AUTEUR</th>
                    {{-- <td>{{ $livre->auteur->prenom.' '.$livre->auteur->nom }}</td> --}}
                    <td id="author" title="Books by the same author"><a style="color: black" href="{{ route('auteurs.show', $livre->auteur->id) }}">{{ $livre->auteur->prenom.' '.$livre->auteur->nom }}</a></td>
                </tr>
                <tr>
                    <th>DESCRIPTION</th>
                    <td>{{ $livre->description }}</td>
                </tr>
                <tr>
                    <th>STATUS</th>
                    <td>
                        @if ($livre->quantite)
                            <span>in stock</span>
                        @else
                            <span>out of stock</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>PRIX</th>
                    <td><span style="color: red; font-weight: 900">{{ $livre->prix }},00 $</span></td>
                </tr>
            </table>
        </div>
    </div>
    @if( count($similarBooks) )
        <h2 class="text-center m-5 border p-2 border-left-0 border-right-0"> Similar Books :</h2>
        <footer class="d-flex align-items-center justify-content-around p-5 w-100 flex-wrap">
            @foreach ($similarBooks as $book)
                <div class="mini-card py-2 pl-1 pr-5 border mb-3" style="width: 40%">
                    <a href="{{ route('livres.show', $book->id) }}" class="w-100 d-flex align-items-start" style="color: #BF2330">
                        <img src="{{ asset($book->image) }}" alt="Book Image" style="width: 90px; height: 140px; box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;" class="mr-4">
                        <div>
                            <h4>{{ $book->titre }}</h4>
                            <h6>By : {{ $book->auteur->prenom.' '.$book->auteur->nom }}</h6>
                            <p style="width: 50ch;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $book->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </footer>
    @else
        <h2 class="text-center m-5 border p-2 border-left-0 border-right-0"> Recommended Books :</h2>
        <footer class="d-flex align-items-center justify-content-around p-5 w-100 flex-wrap">
            @foreach ($recommendedBooks as $book)
                <div class="mini-card py-2 pl-1 pr-5 border mb-3" style="width: 40%">
                    <a href="{{ route('livres.show', $book->id) }}" class="w-100 d-flex align-items-start" style="color: #BF2330">
                        <img src="{{ asset($book->image) }}" alt="Book Image" style="width: 90px; height: 140px; box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;" class="mr-4">
                        <div>
                            <h4>{{ $book->titre }}</h4>
                            <h6>By : {{ $book->auteur->prenom.' '.$book->auteur->nom }}</h6>
                            <p style="width: 50ch;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $book->description }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </footer>
    @endif
</body>
</html>
