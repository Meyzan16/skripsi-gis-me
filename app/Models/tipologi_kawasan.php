<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\calculasi_tipologi;

class tipologi_kawasan extends Model
{
    use HasFactory;

    public function calculasi_tipologi()
    {
        return $this->hasMany(calculasi_tipologi::class , 'id');
    }

}
