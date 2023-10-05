<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GestaoFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo'=> 'required|min:5|max:150',
            'descricao'=>'required|min:5|max:200',
            'data_inicio'=>'required|date',
            'data_termino'=>'date',
            'valor_projeto'=>'required|decimal',
            'status'=>'required'
        ];
    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success'=> false,
            'error'=>$validator->errors()
        ]));
    }

    public function messages(){
        return [
        'titulo.required' => 'o campo é obrigatorio',
        'titulo.min'=>'o campo deve conter no minimo 5 letras',
        'titulo.max'=>'o campo deve conter no maximo 150 caracteres',
        'descricao'=> 'o campo é obrigatório',
        'descricao.min'=> 'o campo deve conter no minimo caracteres',
        'descricao.max'=> 'o campo deve conter no maximo caracteres',
        'data_inicio.required'=>"campo obrigatorio",
        'data_inicio.date'=>"campo obrigatorio",
        
        ];
    }
}
