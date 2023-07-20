<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AsesmenUpdateRequest extends FormRequest
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
            'order' => ['required', 'integer', Rule::unique('asesmens', 'order')->ignore($this->order, 'order')],
            'soal_asesmen' => 'required',
            'video_pembelajaran' => 'mimes:mp4,mov,ogg,3gp,flv,avi,wmv|max:100000',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi',
            'unique' => ':attribute harus unik',
            'integer' => ':attribute harus berupa angka',
            'mimes' => ':attribute harus berformat MP4/MOV/OGG/3GP/FLV/AVI/WMV',
            'max' => ':attribute ukuran maksimal :max MB',
        ];
    }
}
