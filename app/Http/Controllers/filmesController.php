<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Filme;
use App\Models\Genero;
use App\Models\Diretor;

class FilmesController extends Controller
{
    public function index()
    {
        // Usa eager loading para evitar N+1 queries
        $filmes = Filme::with(['genero', 'diretor'])
            ->where('created_by', auth()->id())
            ->get();

        return view('filmes.index', compact('filmes'));
    }

    public function create()
    {
        $generos = Genero::all();
        $diretores = Diretor::all();

        return view('filmes.create', compact('generos', 'diretores'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|exists:generos,id',  // valida o ID do gênero
            'diretor' => 'required|exists:diretores,id', // valida o ID do diretor
            'ano' => 'nullable|string',
        ]);

        $data['created_by'] = Auth::id();

        $filme = Filme::create($data);

        return redirect()
            ->route('filmes.show', $filme)
            ->with('success', 'Filme criado com sucesso!');
    }

    public function show($id)
    {
        $filme = Filme::with(['genero', 'diretor'])->findOrFail($id);
        return view('filmes.show', ['filme' => $filme]);
    }

    public function edit(string $id)
    {
        $filme = Filme::findOrFail($id);
        $generos = Genero::all();
        $diretores = Diretor::all();

        return view('filmes.edit', compact('filme', 'generos', 'diretores'));
    }

    public function update(Request $request, string $id)
    {
        $filme = Filme::findOrFail($id);

        if ($filme->created_by !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|exists:generos,id',
            'diretor' => 'required|exists:diretores,id',
            'ano' => 'nullable|string',
        ]);

        $filme->update($data);

        return redirect()
            ->route('filmes.show', $filme)
            ->with('success', 'Filme atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $filme = Filme::findOrFail($id);

        if ($filme->created_by !== Auth::id()) {
            abort(403);
        }

        $filme->delete();

        return redirect()
            ->route('filmes.index')
            ->with('success', 'Filme excluído com sucesso!');
    }
}
