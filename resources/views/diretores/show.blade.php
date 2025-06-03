<x-layouts.app>
    <div>
        <h1>{{ $diretor->nome }}</h1>

        <h1>{{ $diretor->nacionalidade  }}</h1>

        <div>
            <a href="{{ route('diretores.create') }}">Novo diretor</a>
            <a href="{{ url()->previous() }}">Voltar</a>
        </div>
    </div>
</x-layouts.app>