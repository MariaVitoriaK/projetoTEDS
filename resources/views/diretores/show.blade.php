<x-layouts.app>

    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Detalhes da Avaliação</h1>
        <div class="card">
            <div class="card-section">
                <h2>Nome:</h2>
                <p>{{ $diretor->nome }}</p>
            </div>

            <div class="card-section">
                <h2>Nacionalidade:</h2>
                <p>{{  $diretor->nacionalidade }}</p>
            </div>
            <div class="form-actions">
                <a href="{{ route('diretores.edit', $diretor) }}" class="btn yellow">Editar</a>
                <a href="{{ route('diretores.index')}}" class="btn gray">Voltar</a>
            </div>
        </div>
    </div>
</x-layouts.app>