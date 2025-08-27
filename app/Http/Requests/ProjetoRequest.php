<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $dados = $this->all();

        if (isset($dados['orcamento'])) {
            $dados['orcamento'] = str_replace(['.', ','], ['', '.'], $dados['orcamento']);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'string',
            'max:255',
            'orcamento' => 'required',
            'numeric',
            'min:0',
            'data_inicio' => 'required',
            'date',
            'data_final' => 'nullable',
            'date',
            'after_or_equal:data_inicio',
            'client_id' => 'required',
            'exists:clients,id',
        ];
    }
}
