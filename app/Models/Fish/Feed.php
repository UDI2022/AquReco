<?php

namespace App\Models\Fish;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fish\Fish;

class Feed extends Model
{
    protected $table = 'feed';
    public function fish(){
        return $this->belongsTo(Fish::class,'id', 'feed');
    }
}
