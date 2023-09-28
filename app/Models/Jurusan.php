<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image1',
        'image2',
        'image3',
        'keterangan'
    ];

    public function Siswa(): HasMany {
        return $this->hasMany(Siswa::class, 'jurusan', 'id');
    }
}
