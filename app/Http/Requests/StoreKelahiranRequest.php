<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKelahiranRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            // 'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            // 'jam_lahir' => 'required|date_format:H:i:s',
            'keluarga' => 'required|string',
            // 'nama_ayah' => 'required|string|max:255',
            // 'nama_ibu' => 'required|string|max:255',
        ];
    }
}
