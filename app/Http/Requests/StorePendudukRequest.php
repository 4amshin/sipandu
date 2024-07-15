<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePendudukRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nik' => 'required|string|size:16|unique:penduduks,nik',
            'no_kk' => 'required|string|size:16',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|in:Islam,Kristen,Katolik,Hindu,Buddha',
            'status_pernikahan' => 'required|string|in:kawin,belum_kawin',
            'pekerjaan' => 'nullable|string|max:255',
            'rt' => 'required|integer|min:1',
            'rw' => 'required|integer|min:1',
            'dusun' => 'required|string|max:255',
        ];
    }
}
