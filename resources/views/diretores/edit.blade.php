<x-layouts.app :title="__('Editar diretor')" :dark-mode="auth()->user()->pref_dark_mode">
    <div>
        <h1>Editar diretor</h1>

        <form action="{{ route('diretores.update', $diretor) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="nome">Nome</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $diretor->nome) }}" required>
            </div>

            <div style="margin-top:1em;">
                <label for="nacionalidade">Nacionalidade</label><br>
                <input type="text" name="nacionalidade" id="nacionalidade"
                    value="{{ old('nacionalidade', $diretor->nacionalidade) }}">
            </div>

            <div style="margin-top:1em;">
                <button type="submit">Atualizar</button>
                <a href="{{ route('diretores.show', $diretor) }}">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>