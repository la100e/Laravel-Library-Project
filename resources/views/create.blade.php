<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Book</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        h1 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            color: #BF2330;
        }
        .form-control {
            border: 1px solid #BF2330; !important
        }
        .col-form-label {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 400;
            text-transform: uppercase;
        }
    </style>
</head>
<body class="d-flex align-items-center flex-column justify-content-center">
    {{-- @include('layouts.header') --}}
    <h1 class="text-center">New Book</h1>
    <form style="margin-top: 100px;" class="form w-50" method="POST" action="{{ route('livres.store') }}" enctype="multipart/form-data">
        @csrf
        <label class="col-form-label m-2" for="isbn">ISBN : </label>
        <input class="form-control m-2 p-2" type="text" name="isbn" id="isbn"/>
        @error('isbn')
            <span style="color: red; font-weight: 400">* ISBN code is required !</span><br/>
        @enderror
        <label class="col-form-label m-2" for="titre">Titre : </label>
        <input class="form-control m-2 p-2" type="text" name="titre" id="titre"/>
        @error('titre')
            <span style="color: red; font-weight: 400">* The title is required !</span><br/>
        @enderror
        <label class="col-form-label m-2" for="prix">Prix : </label>
        <input class="form-control m-2 p-2" type="text" name="prix" id="prix"/>
        @error('prix')
            <span style="color: red; font-weight: 400">* The price is required and must be a number !</span><br/>
        @enderror
        <label class="col-form-label m-2" for="quantite">Quantite : </label>
        <input class="form-control m-2 p-2" type="number" name="quantite" id="quantite"/>
        @error('quantite')
            <span style="color: red; font-weight: 400">* The quantity is required and must be an integer !</span><br/>
        @enderror
        <label class="col-form-label m-2" for="description">Description : </label>
        {{-- <input class="form-control m-2 p-2" type="text" name="description" id="description"/> --}}
        <textarea class="form-control m-2 p-2" name="description" id="description" cols="30" rows="10"></textarea>
        @error('description')
            <span style="color: red; font-weight: 400">* The description is required !</span><br/>
        @enderror
        <label class="col-form-label m-2" for="auteur">Auteur : </label>
        <select class="form-control m-2 p-2" name="auteur" id="auteur">
            <option value="">Liste des auteurs</option>
            @foreach ($auteurs as $auteur)
                <option value="{{ $auteur->id }}">{{ $auteur->prenom.' '. $auteur->nom }}</option>
            @endforeach
        </select>
        @error('auteur')
            <span style="color: red; font-weight: 400">* Choose an author !</span><br/>
        @enderror
        <label class="col-form-label m-2" for="categorie">Categorie : </label>
        <select class="form-control m-2 p-2" name="categorie" id="categorie">
            <option value="">Liste des categories</option>
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
            @endforeach
        </select>
        @error('categorie')
            <span style="color: red; font-weight: 400">* Choose a category !</span><br/>
        @enderror
        <label class="col-form-label m-2" for="image">Image : </label>
        <input class="form-control m-2 p-2" type="file" name="image" id="image"/>
        @error('image')
            <span style="color: red; font-weight: 400">* The image is required !</span><br/>
        @enderror
        <span class="d-flex align-content-end justify-content-end">
            <input class="btn btn-primary m-2" type="submit" value="Créer le livre"/>
            <input class="btn btn-danger m-2" type="reset" value="Réinitialiser"/>
            <a class="btn btn-dark m-2" href="{{ route('livres.index') }}">Annuler</a>
        </span><br/>
    </form>
</body>
</html>
