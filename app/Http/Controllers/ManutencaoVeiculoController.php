<?php
namespace App\Http\Controllers;

use App\ManutencaoVeiculo;
use Illuminate\Http\Client\Request;

class ManutencaoVeiculoController {

    public function index()
    {
        return [
            'Manut1',
            'Manut2'
        ];
    }

    public function store(Request $request)
    {
        
        return response()->json([
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
            'data' => $request->data,
            'placa' => $request->placa,
            'fabricante' => $request->fabricante,
            'modelo' => $request->modelo,
            'ano' => $request->ano,
        ], 201);
    }

    public function get(int $id)
    {
            $manutencaoVeiculo = ManutencaoVeiculo::find($id);
            return $manutencaoVeiculo;
    }

    public function show(int $id)
{
    $manutencaoVeiculo = ManutencaoVeiculo::find($id);
    if (is_null($manutencaoVeiculo)) {
        return response()->json('', 204);
    }

    return response()->json($manutencaoVeiculo);
}



    public function update(int $id, Request $request)
    {
        $manutencaoVeiculo = ManutencaoVeiculo::find($id);
        if (is_null($manutencaoVeiculo)) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }
        $manutencaoVeiculo->fill($request->all());
        $manutencaoVeiculo->save();
    
        return $manutencaoVeiculo;
    }

    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = ManutencaoVeiculo::destroy($id);
        if ($qtdRecursosRemovidos === 0) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }

        return response()->json('', 204);
    }

}