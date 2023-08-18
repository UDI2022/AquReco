<?php

namespace App\Models\Woods;

use Illuminate\Database\Eloquent\Model;

class WoodSize extends Model
{
    protected $table = 'woodsize'; // woodsizeテーブルに接続

    // WoddSizeモデルとWoodモデルの関連を定義
    // Woodsizeを取得した場合、複数のwoodテーブルの数値が抽出できる
    public function woods()
    {
        return $this->hasMany(Wood::class, 'size', 'id');
    }
}
