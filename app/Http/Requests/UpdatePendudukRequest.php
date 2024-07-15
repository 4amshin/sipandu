<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePendudukRequest extends FormRequest
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
            'nik' => 'required|string|max:16',
            'no_kk' => 'required|string|max:16',
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date', // tambahan aturan untuk tanggal_lahir
            'tempat_lahir' => 'required|string|max:255', // tambahan aturan untuk tempat_lahir
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha', // tambahan aturan untuk agama
            'status_pernikahan' => 'required|in:belum_kawin,kawin', // tambahan aturan untuk status_pernikahan
            'pekerjaan' => 'nullable|string|max:255', // tambahan aturan untuk pekerjaan
            'rt' => 'required|integer|min:1',
            'rw' => 'required|integer|min:1',
            'dusun' => 'required|string|max:255',

        ];
    }
}
