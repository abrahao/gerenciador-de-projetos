<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Lista os clientes do banco de dados
     * 
     * @return View|Factory 
     */
    public function index()
    {
        $clientes = Client::paginate(10);
        $clientes->load('projects');

        return view('clientes.index', [
            'clientes' => $clientes
        ]);
    }

    /**
     * Mostra o formulário de cadastro de clientes
     * 
     * @return View|Factory 
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Grava o cliente no banco de dados
     */
    public function store(ClienteRequest $request)
    { 
        Client::create($request->except('_token'));

        return redirect()
            ->route('clients.index')
            ->with('mensagem', 'Cliente cadastrado com sucesso!');

    }

    /**
     * Mostra o formulário de edição de clientes
     */
    public function edit($clientId ){
        $cliente = Client::find($clientId);
        return view('clientes.edit', [
            'cliente' => $cliente
        ]);
    }

    /**
     * Atualiza o cliente no banco de dados
     */
    public function update(ClienteRequest $request, $clientId){

        $dados = $request->only('nome', 'endereco', 'descricao');
        $cliente = Client::where('id', $clientId)->first();
        $cliente->update($dados);

        return redirect()
            ->route('clients.index')
            ->with('mensagem', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove o cliente do banco de dados
     */
    public function destroy($clientId){
        $cliente = Client::where('id', $clientId)->first();
        $cliente->delete();
        return redirect()
            ->route('clients.index')
            ->with('mensagem', 'Cliente removido com sucesso!');
            // ->with('mensagem', 'Cliente removido com sucesso!');
    }
        
}
