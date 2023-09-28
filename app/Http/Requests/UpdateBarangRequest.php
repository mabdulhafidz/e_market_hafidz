<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBarangRequest extends FormRequest
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
            'kode_barang' => ['required', 'digits_between:1,50', 'numeric'],
            'produk_id' => ['required', 'exists:produk,id'],
            'nama_barang' => ['required', 'max:50', 'string' ],
            'satuan' => ['required', 'max:20', 'string'],
            'harga_jual' => ['required','numeric' ],
            'stok_barang' => ['required', 'numeric'],
            'ditarik' => ['required', 'numeric'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'nama_barang.required' => 'Data nama barang belum diisi!',
            'kode_barang.required' => 'Data kode barang belum diisi!',
            'satuan.required' => 'Data satuan belum diisi!',
            'harga_jual.required' => 'Data harga jual belum diisi!',
            'stok_barang.required' => 'Data stok barang belum diisi!',
            'user_id.required' => 'Data user belum diisi'
        ];
    }
}
