<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script src="{{ asset('jquery/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <style>
        body {
            width: 100vw;
            height: 100vh;
            background-size: cover;
            background-repeat: no-repeat;
            opacity: .9;
        }

        h1 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 900;
            font-size: 100px;
            text-transform: uppercase;
            color: white;
        }
        h2 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            color: #BF2330;
        }
    </style>
</head>
<body style="background-image: url({{ asset('bg1.jpg') }})">
    @include('layouts.nav')
    <div class="d-flex flex-column align-items-center justify-content-center w-100 h-100">
        <h1>Welcome to </h1>
        <h1>E-Library</h1>
    </div>
    <div style="margin-top: 200px" class="d-flex flex-column align-items-center justify-content-center">
        <h2 class="m-5">    About Us    </h2>
        <p class="p-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt ut corporis, fugiat officia saepe nisi ad suscipit sed exercitationem praesentium perspiciatis aut consectetur quisquam. Ratione maiores consequuntur cum doloribus possimus non laborum perferendis, quibusdam distinctio iste provident reprehenderit. Aut deleniti inventore quisquam assumenda esse omnis officia et commodi quae veritatis dolorem facere non, laudantium eaque magni. Temporibus eligendi ipsam similique mollitia ut, ad repellat incidunt sunt voluptatum possimus laborum odio culpa fugit deserunt iste veritatis amet perferendis modi non facilis? Autem nostrum ducimus iste. Distinctio porro eum enim, corrupti cum cumque? Eos obcaecati incidunt iste cupiditate ullam quod veritatis ab.
        </p>
    </div>
    <div style="margin-top: 100px" class="d-flex flex-column align-items-center justify-content-center">
        <h2 class="m-5">    Latest additions    </h2>
        <main class="d-flex align-items-center justify-content-around flex-wrap w-100">
            @forelse ($livres as $livre)
                <div class = "card" style="width: 400px; height: 600px">
                <img src="{{ asset($livre->image) }}" alt="">
                <div class="card-content">
                    <h2 style="text-align: center">
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
            <a href="{{ route('livres.index') }}" style="color: #BF2330">Find more -></a>
        </main>
    </div>
    <div style="margin-top: 100px; background-color: #BF2330" class="d-flex flex-column align-items-center justify-content-center p-5">
        <p class="p-5 text-center text-white">
            Lorem ipsum dolor sit amet.
        </p>
    </div>
</body>
</html>
