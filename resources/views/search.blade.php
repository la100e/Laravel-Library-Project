<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        h1 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            color: #BF2330;
        }
    </style>
</head>
<body>
    @include('layouts.nav')
    <h1>Search for a book</h1>
    <form class="form-inline" method="POST" action="{{ route('livres.search') }}">
        @csrf
        <input class="form-control mr-sm-2" name="search" id="search" type="text" placeholder="Search by : Titre, Auteur, ISBN" aria-label="Search" value="{{ old('search') }}">
        <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Chercher">
    </form>
</body>
</html>
