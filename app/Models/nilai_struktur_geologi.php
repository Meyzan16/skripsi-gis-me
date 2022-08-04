<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\data_gempa;
use App\Models\data_titik;

class nilai_struktur_geologi extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'id_gempa','id_titik' , 'jarak' , 'nilai_kemampuan'
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
