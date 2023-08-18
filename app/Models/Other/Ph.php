<?php
namespace App\Models\Other;
use Illuminate\Database\Eloquent\Model;

use App\Models\Plants\Plant;
use App\Models\Fish;
class Ph extends Model
{
    protected $table = "ph"; //pHテーブルに接続

    // Plantモデルとの接続
    public function plant()
    {
        return $this->hasMany(Plant::class, 'ph', 'id');
    }

    public function fish()
    {
        return $this->hasMany(Fish::class, 'ph', 'id');
    }
}

