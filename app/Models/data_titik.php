<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\geologi_fisik;
use App\Models\kecamatan;
use App\Models\kemiringan_lereng;
use App\Models\nilai_struktur_geologi;

class data_titik extends Model
{
    use HasFactory;

    protected $fillable = [
        'kecamatan','id_geologi_fisik' , 'id_kemiringan_lereng' , 'latitude' , 'longitude' , 'alamat'
    ];


    public function geologi_fisik()
    {
        return $this->belongsTo(geologi_fisik::class, 'id_geologi_fisik');
    }

    public function kemiringan_lereng()
    {
        return $this->belongsTo(kemiringan_lereng::class, 'id_kemiringan_lereng');
    }
    
    public function nilai_struktur_geologi()
    {
        return $this->hasMany(nilai_struktur_geologi::class);
    }

}
