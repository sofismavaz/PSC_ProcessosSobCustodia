<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadeCustodiadora;

class UnidadeCustodiadoraController extends Controller
{
    // Método para exibir o formulário (poderia ser carregado via AJAX)
    public function showForm()
    {
        return view('unidade_custodiadora.form');
    }

    // Método para buscar um registro [2.3.i]
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        if (empty($searchTerm)) {
            return response()->json(['message' => 'Nenhum termo de busca fornecido.', 'data' => null]);
        }

        // Tenta buscar por ID ou nome
        $unidade = UnidadeCustodiadora::where('id', $searchTerm)
                                      ->orWhere('unidadeCustodiadora', 'like', '%' . $searchTerm . '%')
                                      ->first();

        if ($unidade) {
            return response()->json(['success' => true, 'data' => $unidade, 'message' => 'Registro encontrado.']);
        } else {
            return response()->json(['success' => false, 'data' => null, 'message' => 'Nenhum registro encontrado. Campos desbloqueados para novo registro.']); // [2.3.i.1]
        }
    }

    // Método para salvar/atualizar um registro (CRUD - Create/Update) [2.3.iv]
    public function store(Request $request)
    {
        $request->validate([
            'unidadeCustodiadora' => 'required|string|max:255',
            'autorRegistro' => 'required|string|max:255',
            'dataHoraRegistro' => 'required|date_format:Y-m-d H:i:s',
        ]);

        if ($request->filled('id')) {
            // Atualizar registro existente
            $unidade = UnidadeCustodiadora::find($request->input('id'));
            if (!$unidade) {
                return response()->json(['success' => false, 'message' => 'Registro não encontrado para atualização.'], 404);
            }
            $unidade->update($request->all());
            return response()->json(['success' => true, 'message' => 'Registro atualizado com sucesso!', 'data' => $unidade]);
        } else {
            // Criar novo registro
            $unidade = UnidadeCustodiadora::create($request->all());
            return response()->json(['success' => true, 'message' => 'Registro criado com sucesso!', 'data' => $unidade]);
        }
    }

    // Método para deletar um registro (CRUD - Delete)
    public function destroy($id)
    {
        $unidade = UnidadeCustodiadora::find($id);
        if (!$unidade) {
            return response()->json(['success' => false, 'message' => 'Registro não encontrado para exclusão.'], 404);
        }
        $unidade->delete();
        return response()->json(['success' => true, 'message' => 'Registro excluído com sucesso!']);
    }

    // Método para listar todos os registros (CRUD - Read - Opcional para uma tela de listagem)
    public function index()
    {
        $unidades = UnidadeCustodiadora::all();
        return view('unidade_custodiadora.index', compact('unidades'));
    }
}