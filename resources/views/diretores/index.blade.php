<x-layouts.app :title="__('Diretores')">
    <div>
        <div>
            <h1>Diretores</h1>
            <a href="{{ route('diretores.create') }}">+ Novo Diretor</a>
        </div>

        @if($diretores->isEmpty())
            <p>Nenhum diretor cadastrado.</p>
        @else
            <table border="1" cellpadding="8" cellspacing="0">
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
                                <a href="{{ route('diretores.show', $diretor) }}">Ver</a>
                                |
                                <a href="{{ route('diretores.edit', $diretor) }}">Editar</a>
                                |
                                <form action="{{ route('diretores.destroy', $diretor) }}" method="POST" style="display:inline"
                                    onsubmit="return confirm('Tem certeza que deseja excluir este Diretor?')">
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