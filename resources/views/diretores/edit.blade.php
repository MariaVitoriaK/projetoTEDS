<x-layouts.app :title="__('Editar diretor')" :dark-mode="auth()->user()->pref_dark_mode">

    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Editar diretor</h1>

        <form action="{{ route('diretores.update', $diretor) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $diretor->nome) }}" required>
            </div>

            <div class="form-group">
                <label for="nacionalidade">Nacionalidade</label><br>
                <input type="text" name="nacionalidade" id="nacionalidade"
                    value="{{ old('nacionalidade', $diretor->nacionalidade) }}">
            </div>

            <div class="form-actions">
                <button type="submit">Atualizar</button>
                <a href="{{ route('diretores.show', $diretor) }}">Cancelar</a>
            </div>
        </form>
    </div>
</x-layouts.app>