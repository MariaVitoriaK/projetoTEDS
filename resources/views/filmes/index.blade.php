<x-layouts.app :title="__('Filmes')">
  <div>
    <div>
      <h1>Filmes</h1>
      <a href="{{ route('filmes.create') }}">+ Novo Filme</a>
    </div>

    @if($filmes->isEmpty())
      <p>Nenhum filme cadastrado.</p>
    @else
      <table border="1" cellpadding="8" cellspacing="0">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($filmes as $filme)
            <tr>
              <td>{{ $filme->nome }}</td>
              <td>{{ $filme->genero}}</td>
              <td>
                <a href="{{ route('filmes.show', $filme) }}">Ver</a>
                |
                <a href="{{ route('filmes.edit', $filme) }}">Editar</a>
                |
                <form action="{{ route('filmes.destroy', $filme) }}" method="POST" style="display:inline" onsubmit="return confirm('Tem certeza que deseja excluir este filme?')">
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
