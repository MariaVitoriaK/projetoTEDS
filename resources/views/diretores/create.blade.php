<x-layouts.app>
    <div>
        <h1>Novo Diretor</h1>
        {{-- <a href="{{ route('diretores.index') }}">Voltar</a> --}}

        <form action="{{ route('diretores.store') }}" method="POST">
            @csrf

            <div>
                <label for="nome">Nome do Diretor</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Ex: Walter Salles"
                    required>
            </div>

            <div style="margin-top:1em;">
                <label for="nacionalidade">Nacionalidade</label><br>
                <input type="text" name="nacionalidade" id="nacionalidade" value="{{ old('nacionalidade') }}"
                    placeholder="Ex: Brasileiro">
            </div>

            <div style="margin-top:1em;">
                <button type="submit">Adicionar diretor</button>
            </div>
        </form>
    </div>

</x-layouts.app>