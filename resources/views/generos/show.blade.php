<x-layouts.app>

    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Detalhes do Gênero</h1>
        <div class="card">
            <div class="card-section">
                <h2>Id:</h2>
                <p>{{ $genero->id }}</p>
            </div>
            <div class="card-section">
                <h2>Gênero:</h2>
                <p>{{ $genero->nome }}</p>
            </div>
            <div class="form-actions">
                <a href="{{ route('generos.edit', $genero) }}" class="btn yellow">Editar</a>
                <a href="{{  route('generos.index')}}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>