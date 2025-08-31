<?php

namespace App\Http\Requests\Domain\Trainings\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'     => 'sometimes|string|min:3',
            'level'     => 'sometimes|in:beginner,intermediate,advanced',
            'is_active' => 'sometimes|boolean',
        ];
    }
}
