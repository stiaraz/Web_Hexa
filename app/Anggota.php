<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggotas';
    protected $primaryKey = 'id_ang';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id_kel',
        'nama_ang',
    ]; 

    public function kelompok(){
    	return $this->belongsTo('App\Kelompok', 'id_kel');
    }
}
