<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id_art';
    public $timestamps = true;
    public $incrementing = true;
    protected $fillable = [
        'id',
        'kategori_art',
        'judul_art',
        'gambar_art',
        'isi_art',
    ];

   public function users()
   {
   	return $this->belongsTo('App\User','id');
   }
}
