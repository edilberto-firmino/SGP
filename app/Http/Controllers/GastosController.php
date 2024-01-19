<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastosController extends Controller
{
    public function index()
    {
        $gastos = Gasto::all();
        return view('gastos.index', compact('gastos'));
    }

    public function create()
    {
        return view('gastos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'data' => 'required|date_format:Y-m-d',
            'valor' => 'required|numeric',
        ]);

        $valor = number_format($request->valor, 2, '.', '');

        $gasto = Gasto::create([
            'descricao' => $request->descricao,
            'data' => $request->data,
            'valor' => $valor,
        ]);

        return redirect()->route('gastos.show', $gasto->id)->with('success', 'Gasto adicionado com sucesso!');
    }

    public function show($id)
    {
        $gasto = Gasto::findOrFail($id);
        return view('gastos.show', compact('gasto'));
    }


    public function download()
    {
        $gastos = Gasto::all();
        $csvData = "Descrição,Data\n";

        foreach ($gastos as $gasto) {
            $dataFormatada = \Carbon\Carbon::parse($gasto->data)->format('d/m/Y');
            $csvData .= "{$gasto->descricao},{$dataFormatada}\n";
        }

        return response($csvData)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="gastos.csv"');
    }

    // app/Http/Controllers/GastosController.php

    public function edit($id)
    {
        $gasto = Gasto::findOrFail($id);
        return view('gastos.edit', compact('gasto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required',
            'data' => 'required|date_format:Y-m-d',
            'valor' => 'required|numeric',
        ]);

        $valor = number_format($request->valor, 2, '.', '');

        $gasto = Gasto::findOrFail($id);
        $gasto->update([
            'descricao' => $request->descricao,
            'data' => $request->data,
            'valor' => $valor,
        ]);

        return redirect()->route('gastos.index')->with('success', 'Gasto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $gasto = Gasto::findOrFail($id);
        $gasto->delete();

        return redirect()->route('gastos.index')->with('success', 'Gasto excluído com sucesso!');
    }
}
