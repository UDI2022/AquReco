<?php

namespace App\Models\Fish;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fish\Fish;

class Caution extends Model
{
    protected $table = 'caution';
    public function fish(){
        return $this->belongsTo(Fish::class,'id', 'caution');
    }
}
