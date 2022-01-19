<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    public function user(){
    	return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
