<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BukuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $buku = $this->route('buku');

        return [
            'kode' => [
                'required',
                'string',
                'max:50',
                Rule::unique('bukus', 'kode')->ignore($buku),
            ],
            'judul' => 'required|string|min:3|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1|max:9999',
            'stok' => 'required|integer|min:0',
            'lokasi' => [
                'nullable',
                'string',
                'max:255',
                ],
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode buku wajib diisi.',
            'kode.unique' => 'Kode buku sudah digunakan.',
            'judul.required' => 'Judul buku wajib diisi.',
            'penulis.required' => 'Nama penulis wajib diisi.',
            'penerbit.required' => 'Nama penerbit wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'stok.required' => 'Stok buku wajib diisi.',
            'stok.integer' => 'Stok harus berupa angka.',
            'stok.min' => 'Stok tidak boleh kurang dari nol.',
            'judul.min' => 'Judul buku minimal 3 karakter.',
        ];
    }
}
