<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\data_gempa;
use App\Models\data_titik;

class calculasi_tipologi extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id_gempa','id_titik' , 'hasil_kali_bobot_geologi_fisik', 'ket_geologi_fisik', 'hasil_kali_bobot_lereng', 'ket_lereng','hasil_pga', 'nilai_kemampuan_pga', 'ket_pga', 'hasil_kali_bobot_pga','hasil_jarak_struktur_geologi',  'nilai_kemampuan_struktur_geologi', 'ket_struktur_geologi', 
        'hasil_kali_bobot_struktur_geologi' , 'skor_akhir' , 'id_tipologi'
    ];

    public function data_gempa()
    {
        return $this->belongsTo(data_gempa::class, 'id_gempa');
    }

    public function data_titik()
    {
        return $this->belongsTo(data_titik::class, 'id_titik');
    }


     

                                                    

}
