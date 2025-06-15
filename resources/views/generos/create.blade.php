<x-layouts.app>

    <head>
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <div class="container">

        <h1>Novo Gênero</h1>

        <form action="{{ route('generos.store') }}" method="POST">
            @csrf
            {{-- Nome do Gênero --}}
            <div class="form-group">
                <label for="nome">Gênero:</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Ex: Suspense" required>
            </div>

            {{-- Botão para adicionar o gênero --}}
            <div class="form-actions">
                <button type="submit">Adicionar Gênero</button>
            </div>
        </form>
    </div>

</x-layouts.app>