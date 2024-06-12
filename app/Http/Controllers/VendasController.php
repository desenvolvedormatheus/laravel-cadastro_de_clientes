<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venda;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cont = Venda::count();
        $vendas = Venda::all();

        return view('dashboard', ["vendas" => $vendas, 'count' => $cont]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            'valor_venda' => 'required|boolean',
        ]);

        $venda = new Venda();
        $venda->cliente_nome = $request->input('cliente_nome');
        $venda->plano_saude = $request->input('plano_saude');
        $venda->data_contratacao = $request->input('data_contratacao');
        $venda->valor_venda = $request->input('valor_venda');
        $venda->user_id = Auth::id(); // Define o user_id como o ID do usuário autenticado
        $venda->save();

        return redirect()->route('vendas.index')->with('success', 'Venda criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(vendas $vendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(vendas $vendas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vendas $vendas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vendas $vendas)
    {
        //
    }
}
