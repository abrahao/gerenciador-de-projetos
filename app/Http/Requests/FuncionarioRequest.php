<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
        if ($this->cep) {
            $this->merge([
                'cep' => preg_replace('/\D/', '', $this->cep),
            ]);
        }

        if ($this->cpf) {
            $this->merge([
                'cpf' => preg_replace('/\D/', '', $this->cpf),
            ]);
        }
        if ($this->numero) {
            $this->merge([
                'numero' => preg_replace('/\D/', '', $this->numero),
            ]);
        }
        // if ($this->data_contratacao) {
        //     $this->merge([
        //         'data_contratacao' => preg_replace('/\D/', '', $this->data_contratacao),
        //     ]);
        // }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'=>['required','string','min:2','max:255'],
            'cpf'=>['required','string','size:11'],
            'data_contratacao'=>['required','date_format:d/m/Y'],
            'logradouro'=>['required','string','max:255'],
            'numero'=>['required','string','max:20'],
            'bairro'=>['required','string','max:100'],
            'cidade'=>['required','string','max:100'],
            'complemento'=>['nullable','string','max:255'],
            'cep'=>['required','string','size:8'],
            'estado'=>['required','string','size:2'],
        ];
    }
}
