<x-layouts.app>

    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Novo Diretor</h1>

        <form action="{{ route('diretores.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Nome do Diretor</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Ex: Walter Salles"
                    required>
            </div>

            <div class="form-group">
                <label for="nacionalidade">Nacionalidade</label><br>
                <input type="text" name="nacionalidade" id="nacionalidade" value="{{ old('nacionalidade') }}"
                    placeholder="Ex: Brasileiro">
            </div>

            <div class="form-actions">
                <button type="submit">Adicionar diretor</button>
            </div>
        </form>
    </div>

</x-layouts.app>