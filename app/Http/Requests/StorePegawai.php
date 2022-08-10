<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePegawai extends FormRequest
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
            'nip' => ['required', 'unique:pegawais,nip', 'numeric', 'digits:18'],
            'nama' => ['required', 'string'],
            'jabatan' => ['required', 'string'],
            'golongan' => ['required', 'gt:0'],
            'status' => ['required'],
            'tmt_cpns' => ['required', 'date', 'before:'.date('Y-m-d')],
            'email' => ['required', 'email', 'ends_with:@bps.go.id'],
            'password' => ['required', 'alpha_num', 'min:8'],
            'role' => ['nullable'],
            'foto' => ['required', 'image']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nip.unique' => 'NIP sudah dipakai. Mohon periksa kembali',
            'nip.digits'  => 'NIP seharusnya 18 digit angka',
            'golongan.gt' => 'Mohon pilih golongan',
            'tmt_cpns.before' => 'Tanggal TMT harus sebelum '.date('Y-m-d'),
            'email.ends_with' => 'Mohon gunakan email BPS',
            'password.min' => 'Password minimal 8 karakter',
            'foto.mimes' => 'Format file yang bisa diunggah hanya .png, .jpg, atau .jpeg'
        ];
    }
}
