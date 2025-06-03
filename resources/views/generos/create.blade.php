<x-layouts.app>
    <div>
        <h1>Novo Gênero</h1>
        {{-- <a href="{{ route('generos.index') }}">Voltar</a> --}}

        <form action="{{ route('generos.store') }}" method="POST">
            @csrf

            <div>
                <label for="nome">Gênero:</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Ex: Suspense" required>
            </div>

            <div style="margin-top:1em;">
                <button type="submit">Adicionar gênero</button>
            </div>
        </form>
    </div>

</x-layouts.app>