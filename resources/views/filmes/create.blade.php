<x-layouts.app>
<div>
  <h1>Novo Filme</h1>
  {{-- <a href="{{ route('filmes.index') }}">Voltar</a> --}}

  <form action="{{ route('filmes.store') }}" method="POST">
    @csrf

    <div>
      <label for="nome">Nome do Filme</label><br>
      <input
        type="text"
        name="nome"
        id="nome"
        value="{{ old('nome') }}"
        placeholder="Ex: Ainda estou aqui"
        required
      >
    </div>

    <div style="margin-top:1em;">
      <label for="genero">genero</label><br>
      <input
        type="text"
        name="genero"
        id="genero"
        value="{{ old('genero') }}"
        placeholder="Ex: Drama"
      >
    </div>

    <div style="margin-top:1em;">
      <button type="submit">Adicionar filme</button>
    </div>
  </form>
</div>

</x-layouts.app>
