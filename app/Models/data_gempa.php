<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\calculasi_tipologi;


class data_gempa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal','latitude', 'label_koor_lintang', 'longitude', 'label_koor_bujur' , 'magnitude','kedalaman','wilayah','dirasakan'
    ];

    // public function calculasi_tipologi()
    // {
    //     return $this->hasMany(calculasi_tipologi::class, 'id_gempa');
    // }

}
