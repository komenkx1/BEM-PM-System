<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;
    protected $table = 'proker';

    public function getImageAttribute()
    {
        return $this->gambar_proker ? asset('storage/img/proker/' . $this->gambar_proker) : asset('assets/img/holder/default-thumbnail.jpg');
    }
}
