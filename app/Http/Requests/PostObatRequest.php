<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostObatRequest extends FormRequest
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
            'kode_obat'         => ['required'],
            'nama_obat'         => ['required'],
            'jenis_obat'        => ['required'],
            'dosis'             => ['required'],
            'uraian'            => ['nullable'],
            'kategori_obat_id'  => ['required'],
            'satuan_obat_id'    => ['required'],
        ];
    }
}
