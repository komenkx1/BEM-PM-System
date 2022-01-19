<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paguyuban extends Model
{
    use HasFactory;
    protected $table = 'paguyuban';

    public function getImageAttribute()
    {
        return $this->gambar ? asset('storage/img/paguyuban/' . $this->gambar) : asset('assets/img/holder/default-thumbnail.jpg');
    }
}
