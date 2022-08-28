<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\calculasi_tipologi;
use App\Models\informasi_tipologi;

class tipologi_kawasan extends Model
{
    use HasFactory;

    public function calculasi_tipologi()
    {
        return $this->hasMany(calculasi_tipologi::class);
    }

    public function informasi_tipologi()
    {
        return $this->belongsTo(informasi_tipologi::class, 'tipologi'); //fk di tabel tipologi
    }

    

    

    
}
