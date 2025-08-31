<?php

namespace App\Domain\Progress\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgresStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'exercise_id' => 'required|exists:exercises,id',
            'done'        => 'required|integer|min:1',
            'started_at'  => 'nullable|date',
            'notes'       => 'nullable|array',
            'notes.series' => 'sometimes|string',
            'notes.carga_inicial' => 'sometimes|string',
            'notes.meta' => 'sometimes|integer|min:1',
        ];
    }
}
