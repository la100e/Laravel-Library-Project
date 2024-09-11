<style>
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
    margin: 40px;
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
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
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
</style>

<nav class="navbar navbar-light mb-5 w-100 p-3" style="background-color: #BF2330">
    <a class="nav-link" style="color: white" href="{{ route('livres.home') }}"><img style="width: 35px; height: 35px;" src="{{ asset('home.png') }}" alt=""></a>
    <a class="nav-link" style="color: white" href="{{ route('livres.index') }}">List of books</a>
    <a class="nav-link" style="color: white" href="{{ route('livres.create') }}">Create New Book</a>
    {{-- <select class="w-9 bg-light p-2 text-center" style="color: #BF2330; cursor: pointer; border-radius: 7px; border: none">
        <option value="">Filter by category</option>
        @foreach ($categories as $categorie)
            <option value=""><a class="nav-link" style="color: white" href="{{ route('categories.show', $categorie->id) }}">{{ $categorie->nom }}</a></option>
        @endforeach
    </select> --}}
    <select class="w-9 bg-light p-2 text-center" style="color: #BF2330; cursor: pointer; border-radius: 7px; border: none" onchange="navigateToCategory(this)">
        {{-- <option style="cursor: pointer" value="">Filter by category</option> --}}
        <option style="cursor: pointer" value="{{ route('livres.index') }}" {{ request()->routeIs('livres.index') ? 'selected' : '' }}>All</option>
        @foreach ($categories as $categorie)
            <option style="cursor: pointer" @php
                try {
                    $selectedCategorie->id == $categorie->id ? print'selected' : print'';
                } catch (\Throwable $th) {
                    //throw $th;
                }
            @endphp
            value="{{ route('categories.show', $categorie->id) }}">{{ $categorie->nom }}</option>
        @endforeach
    </select>

    <script>
    function navigateToCategory(selectElement) {
        var url = selectElement.value;
        if (url) {
            window.location.href = url;
        }
    }
    </script>

    <form class="form-inline" method="POST" action="{{ route('livres.search') }}">
        @csrf
        <input class="form-control mr-sm-2" name="search" id="search" type="text" placeholder="Search by : Titre, Auteur, ISBN" style="width: 400px" aria-label="Search" value="{{ old('search') }}">
        <input class="btn btn-outline-light my-2 my-sm-0" type="submit" value="Chercher">
        {{-- <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><img style="" src="{{asset('search.png')}}" alt=""></button> --}}
    </form>
</nav>
