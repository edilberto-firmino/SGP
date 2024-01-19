<?php

namespace App\Http\Controllers;

use App\Models\Alimentacao;
use Illuminate\Http\Request;

class AlimentacaoController extends Controller
{
    public function index()
    {
        $alimentacoes = Alimentacao::all();
        return view('alimentacoes.index', compact('alimentacoes'));
    }

    public function create()
    {
        return view('alimentacoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'descricao' => 'required',
            'calorias' => 'required|numeric',
        ]);

        Alimentacao::create($request->all());

        return redirect()->route('alimentacoes.index')->with('success', 'Alimentação cadastrada com sucesso.');
    }

    public function show($id)
    {
        try {
            $alimentacao = Alimentacao::findOrFail($id);
            return view('alimentacoes.show', compact('alimentacao'));
        } catch (\Exception $e) {
            if ($e instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return redirect()->route('alimentacoes.index')->with('error', 'Alimentação com ID ' . $id . ' não encontrada.');
            }
            // Tratar outras exceções, se necessário
            return redirect()->route('alimentacoes.index')->with('error', 'Ocorreu um erro ao buscar a alimentação.');
        }
    }





    public function edit($id)
    {
        try {
            $alimentacao = Alimentacao::findOrFail($id);
            return view('alimentacoes.edit', compact('alimentacao'));
        } catch (\Exception $e) {
            return response()->view('errors.404', [], 404);
        }
    }


    public function update(Request $request, Alimentacao $alimentacao)
    {
        try {
            $request->validate([
                'data' => 'required|date',
                'descricao' => 'required',
                'calorias' => 'required|numeric',
            ]);
    
            $alimentacao->update($request->all());
    
            return redirect()->route('alimentacoes.index')->with('success', 'Alimentação atualizada com sucesso.');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('alimentacoes.index')->with('error', 'Alimentação com ID ' . $alimentacao->id . ' não encontrada.');
        } catch (\Exception $e) {
            // Tratar outras exceções, se necessário
            return redirect()->route('alimentacoes.index')->with('error', 'Ocorreu um erro ao atualizar a alimentação.');
        }
    }
 

    public function destroy(Alimentacao $alimentacao)
    {
        $alimentacao->delete();

        return redirect()->route('alimentacoes.index')->with('success', 'Alimentação excluída com sucesso.');
    }
}
