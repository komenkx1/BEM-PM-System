<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LembagaMahasiswa extends Model
{
    use HasFactory;
    protected $table = 'lembaga_mahasiswa';

    public function getImageAttribute()
    {
        return $this->gambar_lembaga ? asset('storage/img/lembaga/' . $this->gambar_lembaga) : asset('assets/img/holder/default-thumbnail.jpg');
    }
}
