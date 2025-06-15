<x-layouts.app :title="__('Editar diretor')" :dark-mode="auth()->user()->pref_dark_mode">

    <head>
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">

        <h1>Editar diretor</h1>

        <form action="{{ route('diretores.update', $diretor) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Nome do Diretor --}}
            <div class="form-group">
                <label for="nome">Nome</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $diretor->nome) }}" required>
            </div>

            {{-- Nacionalidade --}}
            <div class="form-group">
                <label for="nacionalidade">Nacionalidade</label><br>
                <input type="text" name="nacionalidade" id="nacionalidade"
                    value="{{ old('nacionalidade', $diretor->nacionalidade) }}" required>
            </div>

            <div class="form-actions">
                {{-- Botão para Atualizar --}}
                <button type="submit">Atualizar</button>
                {{-- Link para Cancelar a ação --}}
                <a href="{{ route('diretores.show', $diretor) }}">Cancelar</a>
            </div>
        </form>
    </div>

</x-layouts.app>