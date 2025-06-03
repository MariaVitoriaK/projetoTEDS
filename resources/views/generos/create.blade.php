<x-layouts.app>

    <head>
        {{-- Importando o CSS do Laravel (Pasta Public) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <div class="container">
        <h1>Novo Gênero</h1>

        <form action="{{ route('generos.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nome">Gênero:</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Ex: Suspense" required>
            </div>

            <div class="form-actions">
                <button type="submit">Adicionar gênero</button>
            </div>
        </form>
    </div>

</x-layouts.app>