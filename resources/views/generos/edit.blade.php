<x-layouts.app :title="__('Editar gênero')" :dark-mode="auth()->user()->pref_dark_mode">

    <head>
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">
        <h1>Editar Gênero</h1>

        <form action="{{ route('generos.update', $genero) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Nome do Gênero --}}
            <div class="form-group">
                <label for="nome">Nome</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $genero->nome) }}" required>
            </div>


            <div class="form-actions">
                {{-- Botão para Atualizar --}}
                <button type="submit">Atualizar</button>
                {{-- Botão para Cancelar --}}
                <a href="{{ route('generos.show', $genero) }}">Cancelar</a>
            </div>

        </form>

    </div>

</x-layouts.app>