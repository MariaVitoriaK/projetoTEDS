<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Filme;
use App\Models\Genero;
use App\Models\Diretor;

class FilmesController extends Controller
{

    // Exibe a lista de todos os filmes com gênero e diretor carregados.
    public function index()
    {
        $filmes = Filme::with(['genero', 'diretor'])->get();
        return view('filmes.index', compact('filmes'));
    }

    // Exibe o formulário para criar um novo filme.
    public function create()
    {
        $generos = Genero::all();
        $diretores = Diretor::all();
        return view('filmes.create', compact('generos', 'diretores'));
    }

    // Armazena o novo filme no banco de dados.
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'genero_id' => 'required|exists:generos,id',
            'diretor_id' => 'required|exists:diretores,id',
            'ano' => 'nullable|string|max:4',
        ]);

        $data['created_by'] = Auth::id();

        $filme = Filme::create($data);

        return redirect()
            ->route('filmes.show', $filme)
            ->with('success', 'Filme criado com sucesso!');
    }

    // Exibe os detalhes de um filme.
    public function show($id)
    {
        $filme = Filme::with(['genero', 'diretor'])->findOrFail($id);
        return view('filmes.show', ['filme' => $filme]);
    }

    // Exibe o formulário para editar um filme.
    public function edit(string $id)
    {
        $filme = Filme::findOrFail($id);
        $generos = Genero::all();
        $diretores = Diretor::all();

        return view('filmes.edit', compact('filme', 'generos', 'diretores'));
    }

    // Atualiza os dados de um filme.
    public function update(Request $request, string $id)
    {
        $filme = Filme::findOrFail($id);

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'genero_id' => 'required|exists:generos,id',
            'diretor_id' => 'required|exists:diretores,id',
            'ano' => 'nullable|string|max:4',
        ]);

        $filme->update($data);

        return redirect()
            ->route('filmes.show', $filme)
            ->with('success', 'Filme atualizado com sucesso!');
    }

    // Remove um filme do banco de dados.
    public function destroy(string $id)
    {
        $filme = Filme::findOrFail($id);
        $filme->delete();

        return redirect()
            ->route('filmes.index')
            ->with('success', 'Filme excluído com sucesso!');
    }

    // Alterna o status de favorito do filme.
    public function toggleFavorito(Filme $filme)
    {
        $filme->is_favorito = !$filme->is_favorito;
        $filme->save();

        return back()->with('success', 'Status de favorito atualizado com sucesso!');
    }

    // Exibe os filmes marcados como favoritos.
    public function favoritos()
    {
        $filmesFavoritos = Filme::where('is_favorito', true)->with(relations: ['genero', 'diretor'])->get();
        return view('favoritos.index', compact('filmesFavoritos'));
    }

}
