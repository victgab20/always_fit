<?php
namespace App\Domain\Training\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3',
            'level' => 'required|in:beginner,intermediate,advanced',
        ];
    }
}
