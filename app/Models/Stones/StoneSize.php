<?php

namespace App\Models\Stones;

use Illuminate\Database\Eloquent\Model;

class StoneSize extends Model
{
    protected $table = 'stonesize'; // stonesizeテーブルに接続

    // StoneSizeモデルとStoneモデルの関連を定義
    // Stonesizeを取得した場合、複数のStoneテーブルの数値が抽出できる
    public function stone()
    {
        return $this->hasMany(Stone::class, 'size', 'id');
    }
}
