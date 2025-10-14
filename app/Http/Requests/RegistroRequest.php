<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class RegistroRequest extends FormRequest
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
             'cod_sensor' => 'required',
             'valor' => 'required|numeric',
             'unidade' => 'required',
             
        ];
    }
 protected function failedValidation(ValidationValidator $validator)

    {
        // Se a requisiçao vier da API, retrona JSON
        if($this->expectsJson()){
            throw new HttpResponseException(response()->json([
          'sucess' => false,
          'message' => 'Erro de validação',
          'errors' => $validator->errors()
         
            ],422));
        }
        // Se for livewire, lança uma exceção padrão do laravel
        throw new ValidationException($validator);
    }
    public function messages(){
        return [
            'cod_sensor.required' => 'O código do sensor é obrigatório',
             'valor.required' => 'O valor do sensor é obrigatório',
              'valor.numeric' => 'O valor do sensor precisa ser numérico',
               'unidade.required' => 'A unidade de medida é obrigatório',  
        ];
    }
}
