<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EventoFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo'      => 'required|string|max:255',
            'descricao'   => 'required|string',
            'data_evento' => 'nullable|date',
        ];
    }

    /**
     * TICKET #008: mensagens de erro em português exibidas via @error na view.
     */
    public function messages(): array
    {
        return [
            'titulo.required'    => 'O título do evento é obrigatório.',
            'titulo.max'         => 'O título pode ter no máximo 255 caracteres.',
            'descricao.required' => 'A descrição do evento é obrigatória.',
            'data_evento.date'   => 'Informe uma data válida.',
        ];
    }
}
