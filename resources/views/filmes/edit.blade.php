<x-layouts.app :title="__('Editar filme')" :dark-mode="auth()->user()->pref_dark_mode">

  <head>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <div class="container">
    <h1>Editar Filme</h1>

    <form action="{{ route('filmes.update', $filme) }}" method="POST">
      @csrf
      @method('PUT')

      {{-- Nome --}}
      <div class="form-group">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome" value="{{ old('nome', $filme->nome) }}" required>
      </div>

      {{-- Gênero --}}
      <div class="form-group">
        <label for="genero_id">Gênero</label><br>
        <select name="genero_id" id="genero_id" required>
          <option value="">Selecione o Gênero</option>
          @foreach($generos as $genero)
        <option value="{{ $genero->id }}" {{ old('genero_id', $filme->genero_id) == $genero->id ? 'selected' : '' }}>
        {{ $genero->nome }}
        </option>
      @endforeach
        </select>
      </div>

      {{-- Diretor --}}
      <div class="form-group">
        <label for="diretor_id">Diretor</label><br>
        <select name="diretor_id" id="diretor_id" required>
          <option value="">Selecione o Diretor</option>
          @foreach($diretores as $diretor)
        <option value="{{ $diretor->id }}" {{ old('diretor_id', $filme->diretor_id) == $diretor->id ? 'selected' : '' }}>
        {{ $diretor->nome }}
        </option>
      @endforeach
        </select>
      </div>

      {{-- Ano --}}
      <div class="form-group">
        <label for="ano">Ano</label><br>
        <input type="text" name="ano" id="ano" value="{{ old('ano', $filme->ano) }}" required>
      </div>

      <div class="form-actions">
        {{-- Botão para Atualizar --}}
        <button type="submit">Atualizar</button>
        {{-- Link para Cancelar a ação --}}
        <a href="{{ route('filmes.show', $filme) }}">Cancelar</a>
      </div>
    </form>
  </div>

</x-layouts.app>