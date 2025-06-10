<x-layouts.app :title="__('Filmes')">

  <head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <div class="container">
    <div class="header">


      <h1>Filmes</h1>
      <a href="{{ route('filmes.create') }}">+ Novo Filme</a>
    </div>

    @if($filmes->isEmpty())
    <tr>
      <td colspan="3" class="text-center">Nenhum filme cadastrada.</td>
    </tr>
  @else
    <table class="table">
      <thead>
      <tr>
        <th>Nome</th>
        <th>Gênero</th>
        <th>Diretor</th>
        <th>Ano</th>
        <th>Favorito</th> <!-- nova coluna -->
        <th>Ações</th>
      </tr>
      </thead>
      <tbody>
      @foreach($filmes as $filme)
      <tr>
      <td>{{ $filme->nome }}</td>
      <td>{{ $filme->genero->nome ?? '—' }}</td>
      <td>{{ $filme->diretor->nome ?? '—' }}</td>
      <td>{{ $filme->ano }}</td>


      <td style="text-align: center;">
      <form action="{{ route('filmes.toggleFavorito', $filme) }}" method="POST">
        @csrf

        <input type="checkbox" onchange="this.form.submit()" {{ $filme->is_favorito ? 'checked' : '' }}>
      </form>
      </td>

      <td>
      <a href="{{ route('filmes.show', $filme) }}" class="link blue">Ver</a> |
      <a href="{{ route('filmes.edit', $filme) }}" class="link yellow">Editar</a> |
      <form action="{{ route('filmes.destroy', $filme) }}" method="POST" style="display:inline"
        onsubmit="return confirm('Tem certeza que deseja excluir este filme?')">
        @csrf
        @method('DELETE')
        <button type="button" class="link red btn-excluir" data-nome="{{ $filme->nome }}">Excluir</button>
      </form>
      </td>
      </tr>
    @endforeach
      </tbody>
    </table>
  @endif
  </div>
</x-layouts.app>