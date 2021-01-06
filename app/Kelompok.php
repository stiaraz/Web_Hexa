<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'kelompoks';
    protected $primaryKey = 'id_kel';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'nama_kel',
    ]; 
    public function anggota()
    {
        return $this->hasMany('App\Anggota','id_kel');
    }
}
