<x-layouts.app>

  <head>
    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <div class="container">
    <h1>Novo Filme</h1>

    <form action="{{ route('filmes.store') }}" method="POST">
      @csrf

      {{-- Nome --}}
      <div class="form-group">
        <label for="nome">Nome do Filme</label><br>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Ex: Ainda Estou Aqui" required>
      </div>

      {{-- Gênero --}}
      <div class="form-group">
        <label for="genero_id">Gênero</label><br>
        <select name="genero_id" id="genero_id" required>
          <option value="">Selecione o Gênero</option>
          @foreach($generos as $genero)
        <option value="{{ $genero->id }}" {{ old('genero_id') == $genero->id ? 'selected' : '' }}>
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
        <option value="{{ $diretor->id }}" {{ old('diretor_id') == $diretor->id ? 'selected' : '' }}>
        {{ $diretor->nome }}
        </option>
      @endforeach
        </select>
      </div>

      {{-- Ano --}}
      <div class="form-group">
        <label for="ano">Ano</label><br>
        <input type="text" name="ano" id="ano" value="{{ old('ano') }}" placeholder="Ex: 2024" required>
      </div>

      {{-- Botão para adicionar o filme --}}
      <div class="form-actions">
        <button type="submit">Adicionar Filme</button>
      </div>
    </form>
  </div>

</x-layouts.app>