<x-layouts.app>
  <div>
    <h1>{{ $filme->nome }}</h1>

    <h1>{{ $filme->genero  }}</h1>

    <h1>{{ $filme->diretor }}</h1>

    <h1>{{ $filme->ano  }}</h1>

    <div>
      <a href="{{ route('filmes.create') }}">Novo filme</a>
      <a href="{{ url()->previous() }}">Voltar</a>
    </div>
  </div>
</x-layouts.app>