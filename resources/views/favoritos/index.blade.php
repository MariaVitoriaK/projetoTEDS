<x-layouts.app :title="__('Favoritos')">

    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <div class="header">
            <h1>Meus Filmes Favoritos</h1>
        </div>

        @if($filmesFavoritos->isEmpty())
            <table class="table">
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center">Nenhum favorito</td>
                    </tr>
                </tbody>
            </table>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Gênero</th>
                        <th>Diretor</th>
                        <th>Ano</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filmesFavoritos as $filme)
                        <tr>
                            <td>{{ $filme->nome }}</td>
                            <td>{{ $filme->genero->nome ?? '—' }}</td>
                            <td>{{ $filme->diretor->nome ?? '—' }}</td>
                            <td>{{ $filme->ano }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>

</x-layouts.app>