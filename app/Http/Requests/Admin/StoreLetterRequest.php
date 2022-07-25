<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLetterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'nik' => 'integer|required|unique:letters',
            'ttl' => 'required',
            'negara' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'category_id' => 'required'
        ];
    }
}
