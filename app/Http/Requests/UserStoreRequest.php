<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi',
            'string' => ':attribute harus berupa string',
            'email' => ':attribute harus berformat email',
            'min' => ':attribute minimal :min karakter',
            'unique' => ':attribute harus unik'
        ];
    }
}
