<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use App\Http\Requests\ProjetoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Redirect;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projetos = Project::with('client')
        ->paginate(15);
        return view('projetos.index', compact('projetos'));
    }

    /**
     * Show the form for creating a new resource.
     */
public function create(): View|Factory
{
    $clients = Client::all(); // busca todos os clientes
    return view('projetos.create', compact('clients'));
}


    /**
     * Store a newly created resource in storage.
     */
public function store(ProjetoRequest $request): Redirector|RedirectResponse
{
    $data = $request->all();

    // Converter para o formato que o MySQL entende (YYYY-MM-DD)
    $data['data_inicio'] = \Carbon\Carbon::createFromFormat('d/m/Y', $request->data_inicio)->format('Y-m-d');
    $data['data_final']  = \Carbon\Carbon::createFromFormat('d/m/Y', $request->data_final)->format('Y-m-d');

    // Converter orçamento (remover pontos e trocar vírgula por ponto)
    $data['orcamento'] = str_replace(['.', ','], ['', '.'], $request->orcamento);

    Project::create($data);

    return redirect()
        ->route('projetos.index')
        ->with('mensagem', 'Projeto criado com sucesso!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Project $projeto): View|Factory
{
    $clients = Client::all(); // ou Client::all()
    return view('projetos.edit', compact('projeto', 'clients'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(ProjetoRequest $request, Project $projeto): Redirector|RedirectResponse
    {
        $projeto->update(
            $request->all()
        );

        return redirect()
            ->route('projetos.index')
            ->with('mensagem', 'Projeto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $projeto)
    {
        $projeto->delete();
        return Redirect::route('projetos.index')
            ->with('mensagem', 'Projeto excluído com sucesso!');
    }
}
