<?php

namespace App\Http\Requests;

use App\Rules\Cnpj;
use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
            'fantasy_name' => ['required', 'string', 'max:255'],
            'corporate_name' => ['required', 'string', 'max:255'],
            'cnpj' => ['required', 'string', 'unique:units,cnpj', new Cnpj],
            'brand_id' => ['required', 'exists:brands,id'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'fantasy_name.required' => 'O nome fantasia é obrigatório.',
            'fantasy_name.max' => 'O nome fantasia não pode ter mais de 255 caracteres.',
            'corporate_name.required' => 'A razão social é obrigatória.',
            'corporate_name.max' => 'A razão social não pode ter mais de 255 caracteres.',
            'cnpj.required' => 'O CNPJ é obrigatório.',
            'cnpj.unique' => 'Este CNPJ já está cadastrado.',
            'brand_id.required' => 'A marca é obrigatória.',
            'brand_id.exists' => 'A marca selecionada não existe.',
        ];
    }
}
