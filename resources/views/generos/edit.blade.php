<x-layouts.app :title="__('Editar gênero')" :dark-mode="auth()->user()->pref_dark_mode">
    <div>
        <h1>Editar Gênero</h1>

        <form action="{{ route('generos.update', $genero) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="nome">Nome</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $genero->nome) }}" required>
            </div>

            <div style="margin-top:1em;">
                <button type="submit">Atualizar</button>
                <a href="{{ route('generos.show', $genero) }}">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>