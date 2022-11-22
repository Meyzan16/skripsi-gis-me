<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tipologi_kawasan;

class informasi_tipologi extends Model
{
    use HasFactory;

    public function tipologi_kawasan()
    {
        return $this->hasMany(tipologi_kawasan::class, 'id');
    }

   
}
