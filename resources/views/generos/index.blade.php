<x-layouts.app :title="__('Generos')">
    <div>
        <div>
            <h1>Gênero</h1>
            <a href="{{ route('generos.create') }}">+ Novo Gênero</a>
        </div>

        @if($generos->isEmpty())
            <p>Nenhum gênero cadastrado.</p>
        @else
            <table border="1" cellpadding="8" cellspacing="0">
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
                                <a href="{{ route('generos.show', $genero) }}">Ver</a>
                                |
                                <a href="{{ route('generos.edit', $genero) }}">Editar</a>
                                |
                                <form action="{{ route('generos.destroy', $genero) }}" method="POST" style="display:inline"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este Gênero?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-layouts.app>