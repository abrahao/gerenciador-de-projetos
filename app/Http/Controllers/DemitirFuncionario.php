<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Carbon\Carbon;

class DemitirFuncionario extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Employee $funcionario)
    {
        if ($funcionario->data_demissao) {
            return redirect()
                ->route('funcionarios.index')
                ->with('mensagem', 'Funcionário já demitido!');
        }
        $funcionario->update([
            'data_demissao' => Carbon::now() 
        ]);

        return redirect()
            ->route('funcionarios.index')
            ->with('mensagem', 'Funcionário demitido com sucesso!');}
}
