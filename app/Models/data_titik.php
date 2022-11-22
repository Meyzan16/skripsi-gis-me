<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\geologi_fisik;
use App\Models\kecamatan;
use App\Models\kemiringan_lereng;
use App\Models\calculasi_tipologi;

class data_titik extends Model
{
    use HasFactory;

    protected $fillable = [
        'kecamatan','id_geologi_fisik' , 'bebatuan', 'id_kemiringan_lereng' , 'ketinggian', 'jarak', 'derajat_kemiringan', 'latitude' , 'longitude' , 'alamat'
    ];


    public function geologi_fisik()
    {
        return $this->belongsTo(geologi_fisik::class, 'id_geologi_fisik', 'id_geologi_fisik');
    }

    public function calculasi_tipologi()
    {
        return $this->hasMany(calculasi_tipologi::class, 'id_titik');
    }

    public function kemiringan_lereng()
    {
        return $this->belongsTo(kemiringan_lereng::class, 'id_kemiringan_lereng', 'id_kemiringan_lereng');
    }
    
    

}
