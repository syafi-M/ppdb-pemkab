<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
        'fullname' => 'string' ,
        'nisn' => 'string' ,
        'nik' => 'string',
        'no_telp' => 'string' ,
        'asal_sekolah' => 'string',
        'tinggal_bersama'=> 'string' ,
        'alamat_siswa' => 'string',
        'nama_wali' => 'string',
        'alamat_wali' => 'string',    
        'domisili' => 'string',    
        'no_aktif' => 'string',    
        'id_jurusan' => 'integer',  
        'status' => 'string',  
        ];
    }
}
