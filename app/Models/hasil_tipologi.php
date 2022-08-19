<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hasil_tipologi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_titik','nilai_geologi_fisik','nilai_kemiringan_lereng',
         'nilai_kegempaan', 'nilai_kemampuan_struktur_geologi', 'id_gempa' , 
         'id_tipologi'
    ];

    
}
