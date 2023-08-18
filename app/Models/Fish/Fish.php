<?php
namespace App\Models\Fish;
use Illuminate\Database\Eloquent\Model;

use App\Models\Fish\Species;
use App\Models\Fish\Caution;
use App\Models\Fish\Feed;
use App\Models\Other\Ph;

class Fish extends Model
{
    protected $table = "fish";

    public function species()
    {
        return $this->hasMany(Species::class, 'id', 'family');
    }
    public function caution()
    {
        return $this->hasMany(Caution::class, 'id', 'caution');
    }
    public function ph(){
        return $this->hasMany(Ph::class, 'id', 'ph');
    }
    public function feed(){
        return $this->hasMany(Feed::class, 'id', 'feed');
    }

}