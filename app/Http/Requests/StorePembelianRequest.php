<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembelianRequest extends FormRequest
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
    $rules = [
        'kode_masuk' => 'required',
        'tanggal_masuk' => 'required',
        'total' => 'required', 
        'pemasok_id' => 'required',
    ];

    if ($this->has('barang_id')) {
        $rules['barang_id'] = 'required|array';
        $rules['barang_id.*'] = 'required|numeric';
        $rules['harga_beli'] = 'required|array';
        $rules['harga_beli.*'] = 'required|numeric';
        $rules['jumlah'] = 'required|array';
        $rules['jumlah.*'] = 'required|numeric';
        $rules['sub_total'] = 'required|array';
        $rules['sub_total.*'] = 'required|numeric';
    }

    return $rules;
}

}
