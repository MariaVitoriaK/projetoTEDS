<x-layouts.app>

  <head>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <div class="container">

    <h1>Detalhes do Filme</h1>

    <div class="card">

      {{-- Nome --}}
      <div class="card-section">
        <h2>Nome:</h2>
        <p>{{$filme->nome }}</p>
      </div>

      {{-- Gênero --}}
      <div class="card-section">
        <h2>Gênero:</h2>
        <p>{{$filme->genero->nome ?? '—'}}</p>
      </div>

      {{-- Diretor --}}
      <div class="card-section">
        <h2>Diretor:</h2>
        <p>{{$filme->diretor->nome ?? '—'}}</p>
      </div>

      {{-- Ano --}}
      <div class="card-section">
        <h2>Ano:</h2>
        <p>{{$filme->ano}}</p>
      </div>

      {{-- Links para Editar e voltar --}}
      <div class="form-actions">
        <a href="{{ route('filmes.edit', $filme) }}" class="btn yellow">Editar</a>
        <a href="{{ route('filmes.index')  }}" class="btn gray">Voltar</a>
      </div>

    </div>
  </div>

</x-layouts.app>