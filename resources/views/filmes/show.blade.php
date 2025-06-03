<x-layouts.app>

  <head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <div class="container">

    <div class="card">

      <div class="card-section">
        <h2>Nome:</h2>
        <p>{{$filme->nome }}</p>
      </div>

      <div class="card-section">
        <h2>Gênero:</h2>
        <p>{{$filme->genero->nome ?? '—'}}</p>
      </div>

      <div class="card-section">
        <h2>Diretor:</h2>
        <p>{{$filme->diretor->nome ?? '—'}}</p>
      </div>

      <div class="card-section">
        <h2>Ano:</h2>
        <p>{{$filme->ano}}</p>
      </div>

      <div class="form-actions">
        <a href="{{ route('filmes.edit', $filme) }}" class="btn yellow">Editar</a>
        <a href="{{ route('filmes.index')  }}" class="btn gray">Voltar</a>
      </div>
    </div>
</x-layouts.app>