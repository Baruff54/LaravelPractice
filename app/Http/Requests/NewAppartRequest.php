<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAppartRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'titre' => ['required', 'max:100', 'alpha:ascii'],
            'surface' => ['required', 'numeric'],
            'prix' => ['required', 'numeric'],
            'description' => ['max:250', 'nullable'],
            'nbPiece' =>['required', 'numeric'],
            'nbChambre' =>['required', 'numeric'],
            'numEtage' => ['nullable', 'numeric'],
            'adresse' => ['required', 'max:150'],
            'ville' => ['required', 'max:50'],
            'cp' => ['required', 'max:10'],
            'image' => ['image', 'max:2000'],
            'options' => ['nullable'],
        ];
    }
}
