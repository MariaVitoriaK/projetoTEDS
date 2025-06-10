<x-layouts.app :title="__('Generos')">

    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <div class="header">
            <h1>Gênero</h1>
            <a href="{{ route('generos.create') }}">+ Novo Gênero</a>
        </div>

        @if($generos->isEmpty())
            <tr>
                <td colspan="3" class="text-center">Nenhuma avaliação cadastrada.</td>
            </tr>
        @else

            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($generos as $genero)
                        <tr>
                            <td>{{ $genero->nome }}</td>
                            <td>
                                <a href="{{ route('generos.show', $genero) }}" class="link blue">Ver</a>
                                |
                                <a href="{{ route('generos.edit', $genero) }}" class="link yellow">Editar</a>
                                |
                                <form action="{{ route('generos.destroy', $genero) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este Gênero?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="link red btn-excluir"
                                        data-nome="{{ $genero->nome }}">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layouts.app>