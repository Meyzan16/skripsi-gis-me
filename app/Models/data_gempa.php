<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_gempa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal','jam','latitude', 'label_koor_lintang', 'longitude', 'label_koor_bujur' , 'magnitude','kedalaman','wilayah','dirasakan'
    ];

}
