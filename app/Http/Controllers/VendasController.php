<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\TipoPlano;
use App\Models\Plano;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $busca = $request->input('busca');

        $vendas = Venda::where('user_id', Auth::id())->when($busca, function ($query, $busca) {
            return $query->where('cliente_nome', 'like', '%' . $busca . '%');
        })->orderBy('created_at', 'desc')->paginate(7);

        foreach ($vendas as $venda) {
            $venda->data_contratacao = Carbon::parse($venda->data_contratacao)->format('d/m/Y');
        }

        $tipoPlanos = TipoPlano::all();
        $planos = Plano::all();

        return view('vendas.listagem', compact('vendas', 'tipoPlanos', 'planos', 'busca'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoPlanos = TipoPlano::all();
        $planos = Plano::all();
        return view('vendas.create', compact('tipoPlanos', 'planos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente_nome' => 'required',
            'plano_saude' => 'required',
            'data_contratacao' => 'required|date',
            'valor_venda' => 'required|numeric',
            'tipo_plano' => 'required|exists:tipo_planos,id'
        ]);

        $venda = new Venda();
        $venda->cliente_nome = $request->input('cliente_nome');
        $venda->plano_saude = $request->input('plano_saude');
        $venda->data_contratacao = $request->input('data_contratacao');
        $venda->valor_venda = $request->input('valor_venda');
        $venda->tipo_plano = $request->input('tipo_plano');
        $venda->user_id = Auth::id(); // Define o user_id como o ID do usuário autenticado
        $venda->save();

        return redirect()->route('listagem')->with('success', 'Venda criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipoPlanos = TipoPlano::all();
        $planos = Plano::all();

        $venda = Venda::find($id);

        return view('vendas.edit', compact('venda', "planos", "tipoPlanos"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $venda = Venda::find($id);

        $venda->update($request->all());

        return redirect()->route('listagem')->with('success', 'Venda atualizada com sucesso!');
    }

    /**
     * return a report with filters.
     */
    public function analitic(Request $request)
    {
        $mes = $request->input('mes');
        $ano = $request->input('ano');
        $plano = $request->input('plano');
        $tipoPlano = $request->input('tipo_plano');

        $vendas = Venda::where('user_id', Auth::id())
            ->when($mes, function ($query, $mes) {
                return $query->whereMonth('data_contratacao', $mes);
            })
            ->when($ano, function ($query, $ano) {
                return $query->whereYear('data_contratacao', $ano);
            })
            ->when($plano, function ($query, $plano) {
                return $query->where('plano_saude', $plano);
            })
            ->when($tipoPlano, function ($query, $tipoPlano) {
                return $query->where('tipo_plano', $tipoPlano);
            })
            ->orderBy('data_contratacao', 'asc')
            ->paginate(7);

        $totalVendas = Venda::where('user_id', Auth::id())
            ->when($mes, function ($query, $mes) {
                return $query->whereMonth('data_contratacao', $mes);
            })
            ->when($ano, function ($query, $ano) {
                return $query->whereYear('data_contratacao', $ano);
            })
            ->when($plano, function ($query, $plano) {
                return $query->where('plano_saude', $plano);
            })
            ->when($tipoPlano, function ($query, $tipoPlano) {
                return $query->where('tipo_plano', $tipoPlano);
            })
            ->sum('valor_venda');

        foreach ($vendas as $venda) {
            $venda->data_contratacao = Carbon::parse($venda->data_contratacao)->format('d/m/Y');
        }

        $tipoPlanos = TipoPlano::all();
        $planos = Plano::all();

        return view('vendas.relatorio', compact('vendas', 'mes', 'ano', 'plano', 'tipoPlano', 'planos', 'tipoPlanos', 'totalVendas'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $venda = Venda::find($id);

        if ($venda) {
            $venda->delete();
            return redirect()->route('listagem')->with('success', 'Venda excluída com sucesso!');
        }

        return redirect()->route('listagem')->with('error', 'Venda não encontrada.');
    }
}
