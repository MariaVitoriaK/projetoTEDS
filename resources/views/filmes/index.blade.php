<x-layouts.app :title="__('Filmes')">

  <head>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <div class="container">
    <div class="header">

      <h1>Filmes</h1>

      {{-- Link para criar um novo filme --}}
      <a href="{{ route('filmes.create') }}">+ Novo Filme</a>

    </div>

    {{-- Se filmes está vazio, mostra a mensagem --}}
    @if($filmes->isEmpty())

    <tr>
      <td colspan="3" class="text-center">Nenhum filme cadastrado.</td>
    </tr>

  @else

    {{-- Tabela com a lista de filmes --}}
    <table class="table">
      <thead>
      {{-- Cabeçalho --}}
      <tr>
        <th>Nome</th>
        <th>Gênero</th>
        <th>Diretor</th>
        <th>Ano</th>
        <th>Favorito</th>
        <th>Ações</th>
      </tr>
      </thead>

      <tbody>
      {{-- Loop para exibir cada um dos filmes --}}
      @foreach($filmes as $filme)
      <tr>

      <td>{{ $filme->nome }}</td>
      <td>{{ $filme->genero->nome ?? '—' }}</td>
      <td>{{ $filme->diretor->nome ?? '—' }}</td>
      <td>{{ $filme->ano }}</td>

      {{-- Form para alternar o status de favorito --}}
      <td style="text-align: center;">
      <form action="{{ route('filmes.toggleFavorito', $filme) }}" method="POST">
        @csrf
        {{-- Checkbox que envia o form --}}
        <input type="checkbox" onchange="this.form.submit()" {{ $filme->is_favorito ? 'checked' : '' }}>
      </form>
      </td>

      <td>
      {{-- Links para ver e editar o filme --}}
      <a href="{{ route('filmes.show', $filme) }}" class="link blue">Ver</a> |
      <a href="{{ route('filmes.edit', $filme) }}" class="link yellow">Editar</a> |
      {{-- Deletar o filme --}}
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