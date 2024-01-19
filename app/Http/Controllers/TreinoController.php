<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treino;

class TreinoController extends Controller
{
    public function index()
    {
        $treinos = Treino::all();
        return view('treinos.index', compact('treinos'));
    }

    public function create()
    {
        // Se você quiser adicionar uma página para criar treinos, pode ser feito aqui
        return view('treinos.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados, você pode ajustar conforme necessário
        $request->validate([
            'data' => 'required|date',
            'descricao' => 'required|string|max:255',
        ]);

        // Criação do treino
        Treino::create([
            'data' => $request->input('data'),
            'descricao' => $request->input('descricao'),
        ]);

        return redirect()->route('treinos.index')->with('success', 'Treino criado com sucesso!');
    }

    public function show($id)
    {
        $treino = Treino::findOrFail($id);
        return view('treinos.show', compact('treino'));
    }

    public function edit($id)
    {
        $treino = Treino::findOrFail($id);
        return view('treinos.edit', compact('treino'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados, você pode ajustar conforme necessário
        $request->validate([
            'data' => 'required|date',
            'descricao' => 'required|string|max:255',
        ]);

        // Atualização do treino
        $treino = Treino::findOrFail($id);
        $treino->update([
            'data' => $request->input('data'),
            'descricao' => $request->input('descricao'),
        ]);

        return redirect()->route('treinos.index')->with('success', 'Treino atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Exclusão do treino
        $treino = Treino::findOrFail($id);
        $treino->delete();

        return redirect()->route('treinos.index')->with('success', 'Treino excluído com sucesso!');
    }
}
