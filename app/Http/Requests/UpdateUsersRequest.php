<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
{
    public function authorize()
    {
        // Tentukan apakah pengguna memiliki izin untuk melakukan request ini
        // Anda dapat menambahkan logika izin di sini, misalnya hanya admin yang bisa mengupdate pengguna, atau pengguna hanya bisa mengupdate diri mereka sendiri.
        return true;
    }

    public function rules()
    {
        // Tentukan aturan validasi untuk request ini
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user, // Unik kecuali untuk pengguna yang sedang diupdate
            // tambahkan aturan validasi lainnya sesuai kebutuhan Anda
        ];
    }
}
