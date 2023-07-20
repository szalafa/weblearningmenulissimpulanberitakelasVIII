<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required',
            'status' => 'required', 
            'password_confirmation' => 'same:password'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi',
            'email' => ':attribute harus berformat email',
            'same' => ':attribute harus sama dengan kata sandi',
            'min' => ':attribute minimal diisi 8 karakter',
            'max'      => 'Ukuran gambar tidak boleh lebih dari 1000Kb',
            'integer'  => ':attribute harus berupa angka',
            'mimes'    => ':attribute harus berformat PNG, JPG, atau JPEG',
        ];
    }
}
