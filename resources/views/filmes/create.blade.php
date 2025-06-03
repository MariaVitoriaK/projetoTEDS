<x-layouts.app>

  <div>
    <h1>Novo Filme</h1>
    {{-- <a href="{{ route('filmes.index') }}">Voltar</a> --}}

    <form action="{{ route('filmes.store') }}" method="POST">
      @csrf

      <div>
        <label for="nome">Nome do Filme</label><br>
        <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Ex: Ainda estou aqui" required>
      </div>

      <div style="margin-top:1em;">
        <label for="genero_id">Gênero</label><br>
        <select name="genero" id="genero" required>
          <option value="">Selecione o gênero</option>
          @foreach($generos as $genero)
        <option value="{{ $genero->id }}" {{ old('genero') == $genero->id ? 'selected' : '' }}>
        {{ $genero->nome }}
        </option>
      @endforeach
        </select>
      </div>

      <div style="margin-top:1em;">
        <label for="diretor">Diretor</label><br>
        <select name="diretor" id="diretort" required>
          <option value="">Selecione o diretor</option>
          @foreach($diretores as $diretor)
        <option value="{{ $diretor->id }}" {{ old('diretor') == $diretor->id ? 'selected' : '' }}>
        {{ $diretor->nome }}
        </option>
      @endforeach
        </select>
      </div>

      <div style="margin-top:1em;">
        <label for="ano">Ano</label><br>
        <input type="text" name="ano" id="ano" value="{{ old('ano') }}" placeholder="Ex: 2024">
      </div>

      <div style="margin-top:1em;">
        <button type="submit">Adicionar filme</button>
      </div>
    </form>
  </div>

</x-layouts.app>