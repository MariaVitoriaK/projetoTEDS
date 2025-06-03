<x-layouts.app>
    <div>
        <h1>{{ $genero->nome }}</h1>

        <div>
            <a href="{{ route('generos.create') }}">Novo Gênero</a>
            <a href="{{ url()->previous() }}">Voltar</a>
        </div>
    </div>
</x-layouts.app>