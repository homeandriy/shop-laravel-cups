<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVariationRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return auth()->user()->can( config( 'permission.access.products.edit' ) );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array {
        return [
            'price'    => [ "numeric", "min:1" ],
            'quantity' => [ "numeric", "min:1" ]
        ];
    }
}
