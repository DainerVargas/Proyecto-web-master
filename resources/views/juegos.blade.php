@extends('layouts.until')

@section('content')

    <body>
        <strong>¿Quieres registrar un juego? - <a href="{{ route('regisGames') }}">IR...</a></strong>
        @vite('resources/css/style.css')

        <h1>Lista de Juegos</h1>
        <div class="cartaJuegos">
            @foreach ($juegos as $item)
                <div class="card">
                    <img id="imgJuego" src="{{ asset('games/images/' . $item->cover) }}">
                    <h3>{{ $item->name }}</h3>
                    <div class="info">
                        <div class="platform">
                            <p>{{ $item->year }}</p>
                            <p style="color: red">{{ $item->categories['name'] }}</p>
                        </div>
                        <p>{{ $item->platforms->name }}</p>
                    </div>
                    <p>descripcion <a href="{{ route('infoGames', $item) }}" id="descripcion">Leer mas...</a></p>
                    <div id="flex">
                        <a href="{{route('destroy', $item)}}"><img id="imgBorrar" src="/images/imgBorrar.png"></a>
                        <a href=""><img id="imgEditar" src="/images/imgEditar.png"></a>
                    </div>
                </div>
            @endforeach
        </div>
        @if (session('success'))
            <script>
                alert('{{ session('success') }}');
            </script>
        @endif
    @endsection
