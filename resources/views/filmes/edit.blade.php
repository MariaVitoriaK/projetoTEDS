<x-layouts.app :title="__('Editar filme')" :dark-mode="auth()->user()->pref_dark_mode">
  <div>
    <h1>Editar filme</h1>

    <form action="{{ route('filmes.update', $filme) }}" method="POST">
      @csrf
      @method('PUT')

      <div>
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome" value="{{ old('nome', $filme->nome) }}" required>
      </div>

      <div style="margin-top:1em;">
        <label for="genero">Gênero</label><br>
        <input type="text" name="genero" id="genero" value="{{ old('genero', $filme->genero) }}">
      </div>

      <div style="margin-top:1em;">
        <label for="diretor">Diretor</label><br>
        <input type="text" name="diretor" id="diretor" value="{{ old('genero', $filme->diretor) }}">
      </div>

      <div style="margin-top:1em;">
        <label for="ano">Ano</label><br>
        <input type="text" name="ano" id="ano" value="{{ old('ano', $filme->ano) }}">
      </div>

      <div style="margin-top:1em;">
        <button type="submit">Atualizar</button>
        <a href="{{ route('filmes.show', $filme) }}">Cancelar</a>
      </div>
    </form>
  </div>
</x-layouts.app>
///////////////////