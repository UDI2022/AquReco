<?php
namespace App\Models\Plants;
use Illuminate\Database\Eloquent\Model;

use App\Models\Other\PH;
class Plant extends Model
{
    protected $table = 'plant'; // stoneテーブルに接続

    // PlantモデルとPlantSpeciesモデルの関連を定義
    // 複数のPlantテーブルの値から、PlantSpeciesを取得しても問題ない
    public function plantDetail()
    {
        return $this->belongsTo(PlantSpecies::class, 'family', 'id');
    }

    // Plantモデルとphモデルの関連を定義
    public function ph()
    {
        return $this->belongsTo(Ph::class, 'ph', 'id');
    }
}
