<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'economic_group_id' => ['required', 'exists:economic_groups,id'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome da marca é obrigatório.',
            'name.max' => 'O nome da marca não pode ter mais de 255 caracteres.',
            'economic_group_id.required' => 'O grupo econômico é obrigatório.',
            'economic_group_id.exists' => 'O grupo econômico selecionado não existe.',
        ];
    }
}
