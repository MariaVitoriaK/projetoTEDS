<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\genero;

class GenerosController extends Controller
{

    // Exibe a lista de gêneros criados pelo usuário autenticado.
    public function index()
    {
        // Busca apenas gêneros criados pelo usuário autenticado
        $generos = Genero::where('created_by', auth()->id())->get();
        return view('generos.index', compact('generos'));
    }

    // Exibe o formulário para criação de um novo gênero.
    public function create()
    {
        return view('generos.create');
    }

    // Armazena um novo gênero no banco.
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $data['created_by'] = Auth::id();

        $genero = Genero::create($data);

        return redirect()
            ->route('generos.show', $genero)
            ->with('success', 'Gênero criado com sucesso!');
    }

    // Exibe os detalhes de um gênero.
    public function show($id)
    {
        $genero = Genero::findOrFail($id);
        return view('generos.show', ['genero' => $genero]);
    }

    //  Exibe o formulário para edição de um gênero.
    public function edit(string $id)
    {
        $genero = Genero::findOrFail($id);
        return view('generos.edit', compact('genero'));
    }

    // Atualiza os dados de um gênero.
    public function update(Request $request, string $id)
    {
        $genero = Genero::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        if ($genero->created_by !== Auth::id()) {
            abort(403);
        }

        $genero->update($data);

        return redirect()
            ->route('generos.show', parameters: $genero)
            ->with('success', 'Gênero atualizado com sucesso!');
    }

    // Remove um gênero do banco de dados.
    public function destroy(string $id)
    {
        $genero = Genero::findOrFail($id);

        if ($genero->created_by !== Auth::id()) {
            abort(403);
        }

        $genero->delete();

        return redirect()
            ->route('generos.index')
            ->with('success', 'Gênero excluído com sucesso!');
    }
}