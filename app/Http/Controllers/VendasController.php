<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\TipoPlano;
use App\Models\Plano;
use Illuminate\Support\Facades\Auth;

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
        })->paginate(7);

        $tipoPlanos = TipoPlano::all();
        $planos = Plano::all();

        return view('dashboard', compact('vendas', 'tipoPlanos', 'planos', 'busca'));

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

        return redirect()->route('dashboard')->with('success', 'Venda criada com sucesso!');
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
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
