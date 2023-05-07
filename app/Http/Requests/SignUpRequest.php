<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SignUpRequest extends FormRequest
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
            'nom' => ['required', 'max:50', 'alpha:ascii'],
            'prenom' => ['required', 'max:50', 'alpha:ascii'],
            'email' => ['required', 'max:100', 'email', Rule::unique(User::class, 'mail')],
            'telephone' => ['required', 'numeric', 'min:10'],
            'password' =>['required', 'min:8'],
            'password_confirmation' =>['required', 'min:8']
        ];
    }
}
