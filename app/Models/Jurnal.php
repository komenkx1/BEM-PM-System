<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    protected $table = 'jurnal';
    protected $guarded = [];

    public function getImageAttribute()
    {
        return $this->thumbnail ? asset('storage/img/jurnal/' . $this->thumbnail) : asset('assets/img/holder/default-thumbnail.jpg');
    }
}
