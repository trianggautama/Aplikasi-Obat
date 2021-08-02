<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RincianPengeluaranRequest extends FormRequest
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
            'pengeluaran_puskesmas_id'       => ['required'],
            'stok_puskesmas_id'              => ['required'],
            'volume'                         => ['required'],
        ];
    }
}
