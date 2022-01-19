<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukm extends Model
{
    use HasFactory;
    protected $table = 'ukm';

    public function getImageAttribute()
    {
        return $this->gambar ? asset('storage/img/ukm/' . $this->gambar) : asset('assets/img/holder/default-thumbnail.jpg');
    }
}
