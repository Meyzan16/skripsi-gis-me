<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\data_titik;
use App\Models\calculasi_tipologi;

class kemiringan_lereng extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas_informasi','nilai'
    ];

    public function data_titik(){

        return $this->hasMany(data_titik::class);
    }

    public function calculasi_tipologi()
    {
        return $this->hasMany(calculasi_tipologi::class , 'id');
    }
}
