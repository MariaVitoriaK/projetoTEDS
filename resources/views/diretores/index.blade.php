<x-layouts.app :title="__('Diretores')">

    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <div class="header">
            <h1>Diretores</h1>
            <a href="{{ route('diretores.create') }}">+ Novo Diretor</a>
        </div>

        @if($diretores->isEmpty())
            <tr>
                <td colspan="3" class="text-center">Nenhum diretor cadastrado.</td>
            </tr>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nacionalidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diretores as $diretor)
                        <tr>
                            <td>{{ $diretor->nome }}</td>
                            <td>{{ $diretor->nacionalidade}}</td>
                            <td>
                                <a href="{{ route('diretores.show', $diretor) }}" class="link blue">Ver</a>
                                |
                                <a href="{{ route('diretores.edit', $diretor) }}" class="link yellow">Editar</a>
                                |
                                <form action="{{ route('diretores.destroy', $diretor) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este Diretor?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="link red btn-excluir"
                                        data-nome="{{ $diretor->nome }}">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layouts.app>