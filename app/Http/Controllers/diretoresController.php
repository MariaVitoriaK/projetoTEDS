<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\diretor;

class diretoresController extends Controller
{
    public function index()
    {
        $diretores = Diretor::where('created_by', auth()->id())->get();
        return view('diretores.index', compact('diretores'));
    }

    public function create()
    {
        return view('diretores.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'nacionalidade' => 'nullable|string',
        ]);

        $data['created_by'] = Auth::id();

        $diretor = Diretor::create($data);

        return redirect()
            ->route('diretores.show', $diretor)
            ->with('success', 'Diretor criado com sucesso!');
    }

    public function show($id)
    {
        $diretor = Diretor::findOrFail($id);
        return view('diretores.show', ['diretor' => $diretor]);
    }

    public function edit(string $id)
    {
        $diretor = Diretor::findOrFail($id);
        return view('diretores.edit', compact('diretor'));
    }

    public function update(Request $request, string $id)
    {
        $diretor = Diretor::findOrFail($id);
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'nacionalidade' => 'nullable|string',
        ]);

        if ($diretor->created_by !== Auth::id()) {
            abort(403);
        }

        $diretor->update($data);

        return redirect()
            ->route('diretores.show', $diretor)
            ->with('success', 'Diretor atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $diretor = Diretor::findOrFail($id);

        if ($diretor->created_by !== Auth::id()) {
            abort(403);
        }

        $diretor->delete();

        return redirect()
            ->route('diretores.index')
            ->with('success', 'Diretor excluído com sucesso!');
    }
}