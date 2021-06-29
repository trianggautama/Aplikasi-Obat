<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PutUserPuskesmasRequest extends FormRequest
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
            'username'          => ['nullable'],
            'nama'              => ['required'],
            'alamat'            => ['required'],
            'no_hp'             => ['required'],
            'nama_pimpinan'     => ['required'],
            'nip_pimpinan'      => ['required'],
            'jabatan_pimpinan'  => ['required'],
            'password'          => ['nullable','min:8'],
        ];
    }
}
