<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\filme;

class FilmesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filmes = Filme::where('created_by', auth()->id())->get();
        return view('filmes.index', compact('filmes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filmes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'nullable|string',
            'diretor' => 'nullable|string',
            'ano' => 'nullable|string',
        ]);

        $data['created_by'] = Auth::id();

        $filme = Filme::create($data);

        return redirect()
            ->route('filmes.show', $filme)
            ->with('success', 'Filme criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $filme = Filme::findOrFail($id);
        return view('filmes.show', ['filme' => $filme]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $filme = Filme::findOrFail($id);
        return view('filmes.edit', compact('filme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $filme = Filme::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'nullable|string',
            'diretor' => 'nullable|string',
            'ano' => 'nullable|string',
        ]);

        if ($filme->created_by !== Auth::id()) {
            abort(403);
        }

        $filme->update($data);

        return redirect()
            ->route('filmes.show', $filme)
            ->with('success', 'Filme atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
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