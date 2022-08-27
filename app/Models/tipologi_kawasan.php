<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\calculasi_tipologi;
use App\Models\informasi_geologi;

class tipologi_kawasan extends Model
{
    use HasFactory;

    public function calculasi_tipologi()
    {
        return $this->hasMany(calculasi_tipologi::class , 'id');
    }

    
}
