<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\nilai_struktur_geologi;

class data_gempa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal','jam','latitude', 'label_koor_lintang', 'longitude', 'label_koor_bujur' , 'magnitude','kedalaman','wilayah','dirasakan'
    ];

    public function nilai_struktur_geologi()
    {
        return $this->hasMany(nilai_struktur_geologi::class);
    }

}
