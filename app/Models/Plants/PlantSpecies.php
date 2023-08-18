<?php

namespace App\Models\Plants;

use Illuminate\Database\Eloquent\Model;

class PlantSpecies extends Model
{
    protected $table = 'plantspecies'; // plantspeciesテーブルに接続

    // PlantSpeciesモデルとPlantモデルの関連を定義
    // PlantSpeciesを取得した場合、複数のPlantテーブルの数値が抽出できる
    public function plant()
    {
        return $this->hasMany(Plant::class, 'family', 'id');
    }
}
