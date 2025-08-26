<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Enums\EstadosBrasileiros;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\FuncionarioRequest;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Factory
    {
        $funcionarios =  Employee::paginate(15);

        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create():  View|Factory
    {
        return view('funcionarios.create', [
            'lista' => EstadosBrasileiros::cases(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(FuncionarioRequest $request): Redirector|RedirectResponse
    {
        try {
            DB::beginTransaction();
            $funcionario = Employee::create($request->only(['nome', 'cpf', 'data_contratacao']));

            $funcionario->address()->create($request->only([
                'logradouro',
                'numero',
                'complemento',
                'bairro',
                'cidade',
                'estado',
                'cep'
            ]));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->withErrors('Erro ao cadastrar funcionário!');
        }


        return redirect()
            ->route('funcionarios.index')
            ->with('mensagem', 'Funcionário cadastrado com sucesso!');
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
    public function edit($id)
    {
        $funcionario = Employee::with('address')->findOrFail($id);
        return view('funcionarios.edit', compact('funcionario'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(FuncionarioRequest $request, Employee $funcionario): Redirector|RedirectResponse
    {
        try {
            DB::beginTransaction();
            $funcionario->update(
                $request->only(['nome', 'cpf', 'data_contratacao'])
            );

            $funcionario->address()->update($request->only([
                'logradouro',
                'numero',
                'complemento',
                'bairro',
                'cidade',
                'estado',
                'cep'
            ]));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withInput()
                ->withErrors('Erro ao atualizar funcionário!');
        }


        return redirect()
            ->route('funcionarios.index')
            ->with('mensagem', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $funcionario): Redirector|RedirectResponse
    {
        $estaApagado = $funcionario->apagar();

        if (!$estaApagado) {
            return redirect()
                ->back()
                ->withErrors('Erro ao apagar funcionário!');
        }
        return redirect()
            ->route('funcionarios.index')
            ->with('mensagem', 'Funcionário apagado com sucesso!');
    }
}
