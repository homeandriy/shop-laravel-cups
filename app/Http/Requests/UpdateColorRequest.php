<?php

namespace App\Http\Requests;

use App\Models\Attributes\Color;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateColorRequest extends FormRequest
{
    protected string $className = Color::class;

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
        $colorId = $this->route( 'color' )->id;

        return [
            'hex' => ['required', 'string', Rule::unique( Color::class, 'hex' )->ignore( $colorId )],
            'name' => ['required', 'string', 'min:2', 'max:255', Rule::unique( Color::class, 'name' )->ignore( $colorId )],
            'slug' => ['required', 'string', 'min:2', 'max:255', Rule::unique( Color::class, 'slug' )->ignore( $colorId )]
        ];
    }
}
