<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname' ,
        'nisn' ,
        'nik' ,
        'no_telp' ,
        'asal_sekolah' ,
        'tinggal_bersama' ,
        'alamat_siswa' ,
        'nama_wali' ,
        'alamat_wali' ,    
        'domisili' ,    
        'no_aktif' ,    
        'id_jurusan' ,
        'status',
    ];

    public function Jurusan():BelongsTo {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }
}
