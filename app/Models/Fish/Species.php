<?php

namespace App\Models\Fish;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fish\Fish;

class Species extends Model
{
    protected $table = 'species';

    public function fish(){
        return $this->belongsTo(FIsh::class, 'id', 'family');
    }
}
