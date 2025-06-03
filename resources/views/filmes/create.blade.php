<x-layouts.app>

  <head>
    {{-- Importando o CSS do Laravel (Pasta Public) --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <div class="container">
    <h1>Novo Filme</h1>

    <form action="{{ route('filmes.store') }}" method="POST">
      @csrf
      {{-- Token CSRF para segurança --}}

      <div class="form-group">
        <label for="nome">Nome do Filme</label><br>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Ex: Ainda estou aqui" required>
      </div>

      <div class="form-group">
        <label for="genero_id">Gênero</label><br>
        <select name="genero_id" id="genero_id" required>
          <option value="">Selecione o gênero</option>
          @foreach($generos as $genero)
        <option value="{{ $genero->id }}" {{ old('genero_id') == $genero->id ? 'selected' : '' }}>
        {{ $genero->nome }}
        </option>
      @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="diretor_id">Diretor</label><br>
        <select name="diretor_id" id="diretor_id" required>
          <option value="">Selecione o diretor</option>
          @foreach($diretores as $diretor)
        <option value="{{ $diretor->id }}" {{ old('diretor_id') == $diretor->id ? 'selected' : '' }}>
        {{ $diretor->nome }}
        </option>
      @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="ano">Ano</label><br>
        <input type="text" name="ano" id="ano" value="{{ old('ano') }}" placeholder="Ex: 2024">
      </div>

      <div class="form-actions">
        <button type="submit">Adicionar filme</button>
      </div>
    </form>
  </div>

</x-layouts.app>