<?php

namespace App\Http\Requests;

use App\Models\Attributes\Color;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateColorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can(config('permission.access.categories.publish'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'hex' => ['required', 'string', 'min:2', 'max:255', 'unique:' . Color::class],
            'name' => ['required', 'string', 'min:2', 'max:255', 'unique:' . Color::class],
            'slug' => ['required', 'string', 'min:2', 'max:255', 'unique:' . Color::class],
        ];
    }
}
