<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
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
            'nama_pelanggan' => 'required|string|max:255',
            'kode_pelanggan' => 'required|string|max:20|unique:pelanggan,kode_pelanggan,' . $this->segment(3),
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:pelanggan,email,' . $this->segment(3),
        ];
    }
    
    public function messages()
    {
        return [
            'nama_pelanggan.required' => 'Data nama pelanggan belum diisi!',
            'kode_pelanggan.required' => 'Data kode pelanggan belum diisi!',
            'alamat.required' => 'Data alamat belum diisi!',
            'no_telp.required' => 'Data Telp belum diisi!',
            'email.required' => 'Data email belum diisi!',
            
        ];
    }
}
